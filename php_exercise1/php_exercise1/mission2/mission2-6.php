
<title>mission2-6</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <?php
    require 'mission2.h.php';

    $filename='kadai2-6.txt';
    fclose(fopen($filename,"a"));
    date_default_timezone_set('Asia/Tokyo');


    //edit edit
    if(!empty($_POST["edit_no"]) and !empty($_POST["edit_pass"]))
    {

        $edit_num = trim(remove_newlines($_POST["edit_no"]));
        $readonly = "readonly";
        $edit_pass= hash('sha256',$_POST["edit_pass"]);

        $hyouji=file($filename);
        foreach($hyouji as $value)
        {
            $data=explode("<>",$value,5);
            $data[4]=trim(remove_newlines($data[4]));
            if(($data[0]==trim(remove_newlines($edit_num))) and ($data[4]==$edit_pass))
            {
                $edit_name = $data[2];
                $edit_comment = $data[3];
            }
            else if($data[0]==trim(remove_newlines($_POST["edit_no"])))
            {
                $edit_num = '';
                $readonly = '';
                echo "<script>alert('Wrong password')</script>";
            }
        }
    }

    if(!empty($_POST["edit_name"]) and $_POST["edit_comment"] and $_POST["edit_no"])
    {
        $readonly = '';
        $hyouji=file($filename);
        $fp=fopen($filename,'w+');
        $edit_num = '';
        foreach($hyouji as $value)
        {
            $data=explode("<>",$value,5);
            $data[4]=trim(remove_newlines($data[4]));
            if(($data[0]==trim(remove_newlines($_POST["edit_no"]))))
            {
                $data[1] = date("Y/m/d/D G:i:s");
                $data[2] = remove_newlines($_POST["edit_name"]);
                $data[3] = remove_newlines($_POST["edit_comment"]);
                $new_value=implode("<>",$data) . "\n";
                fputs($fp,$new_value);
            }
            else
            {
                fputs($fp,$value);
            }

        }
        fclose($fp);
    }

    ?>


    <center>
        <table class="bigtable">
            <tr>
                <!--comment form-->
                <td>
                    <form action="mission2-6.php" method="post">
                        <h2>Submit entry:</h2>
                        <table class="formtable">
                            <tr>
                                <td class="hclass">Name</td>
                                <td>
                                    <textarea name="name" cols="30" rows="1"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="hclass">Comment</td>
                                <td>
                                    <textarea name="comment" cols="30" rows="3"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="hclass">Password</td>
                                <td>
                                    <textarea name="submit_pass" cols="30" rows="1"></textarea>
                                </td>
                            </tr>

                        </table>
                        <br />
                        <input type="submit" value="submit" />
                        <br />
                    </form>
                </td>
                <!--edit form-->
                <td>
                    <form action="mission2-6.php" method="post">
                        <h2>Edit entry:</h2>
                        <table class="formtable">


                            <tr>
                                <td class="hclass">No.</td>
                                <td>
                                    <textarea name="edit_no" rows="1" cols="30" <?php echo $readonly ?>><?php echo $edit_num ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <?php
                                if($edit_num)
                                {
                                    echo '<td class="hclass">Name</td><td><textarea name="edit_name" rows="1" cols="30">' . $edit_name . '</textarea></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                if($edit_num)
                                {
                                    echo '<td class="hclass">Comment</td><td><textarea name="edit_comment" rows="3" cols="30">' . $edit_comment . '</textarea></td>';
                                }
                                ?>
                            </tr>
                            <tr>
                                <?php
                                if(!$edit_num)
                                {
                                    echo '<td class="hclass">Password</td><td><textarea name="edit_pass" rows="1" cols="30"></textarea></td>';
                                }
                                ?>
                            </tr>
                        </table>
                        <br />
                        <input type="submit" value="Edit entry" />
                    </form>
                </td>
                <!--delete form-->
                <td>
                    <form action="mission2-6.php" method="post">

                        <h2>Delete entry:</h2>
                        <table class="formtable">
                            <tr>
                                <td class="hclass">Entry No.</td>
                                <td>
                                    <textarea name="delete_no" cols="30" rows="1"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="hclass">Password</td>
                                <td>
                                    <textarea name="delete_pass" cols="30" rows="1"></textarea>
                                </td>
                            </tr>
                        </table>
                        <br />
                        <input type="submit" value="Delete entry" />
                        <br />
                    </form>
                </td>

            </tr>
        </table>

        <?php
        //write $num<>name<>comment<>time on text
        if(!empty($_POST["comment"]) and !empty($_POST["name"]) and !empty($_POST["submit_pass"]))
        {

            if(!filesize($filename))
            {
                $num = 1;
            }
            else
            {
                $hyouji=file($filename);
                $num=count($hyouji)+1;
            }


            $submit_pass=hash('sha256',$_POST["submit_pass"]);
            $output  = $num . "<>";
            $output .= date("Y/m/d/D G:i:s") . "<>" . htmlentities(remove_newlines($_POST["name"]))
                       . "<>" . htmlentities(remove_newlines($_POST["comment"])) . "<>" . $submit_pass .  "\n";
            $fp=fopen($filename,'a');
            fwrite($fp,$output);
            fclose($fp);
        }

        else if(empty($_POST["comment"]) and !empty($_POST["name"]) and !empty($_POST["submit_pass"]))
        {
            echo "<script>alert('Please write a comment');</script>";
        }

        else if(!empty($_POST["comment"]) and empty($_POST["name"]) and !empty($_POST["submit_pass"]))
        {
            echo "<script>alert('Please give a name');</script>";
        }

        else if(!empty($_POST["comment"]) and !empty($_POST["name"]) and empty($_POST["submit_pass"]))
        {
            echo "<script>alert('Please give a password');</script>";
        }


        //delete post on text
        else if(!empty($_POST["delete_no"]) and !empty($_POST["delete_pass"]))
        {
            $delete_pass=hash('sha256',$_POST["delete_pass"]);

            $hyouji=file($filename);
            $fp=fopen($filename,'w+');
            foreach($hyouji as $value)
            {
                $data=explode("<>",$value,5);
                $data[4] = trim(remove_newlines($data[4]));
                if(($data[0]==trim(remove_newlines($_POST["delete_no"]))) and ($data[4]==$delete_pass))
                {
                    $data[2] = '-';
                    $data[3] = 'Deleted';
                    $new_value=implode("<>",$data) . "\n";
                    fputs($fp,$new_value);
                }
                else if($data[0]==trim(remove_newlines($_POST["delete_no"])))
                {
                    echo "<script>alert('Wrong password')</script>";
                    fputs($fp,$value);
                }
                else
                {
                    fputs($fp,$value);
                }

            }
            fclose($fp);
        }

        //
        $hyouji=file($filename);
        foreach($hyouji as $value)
        {
            $data=explode("<>",$value,5);
            display_array($data);
        }

        ?>
    </center>
</body>
</html>