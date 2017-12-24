
<title>mission2-5</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <?php
        require 'mission2.h.php';

        $filename='kadai2-5.txt';
        fclose(fopen($filename,"a"));
        date_default_timezone_set('Asia/Tokyo');



        if(!empty($_POST["edit_no"]))
        {

            $edit_num = trim(remove_newlines($_POST["edit_no"]));
            $readonly = "readonly";

            $hyouji=file($filename);
            foreach($hyouji as $value)
            {
                $data=explode("<>",$value,4);
                if($edit_num==$data[0])
                {
                    $edit_name = $data[2];
                    $edit_comment = $data[3];
                }
            }
        }

        if(!empty($_POST["edit_name"]) and $_POST["edit_comment"] and $edit_num)
        {
            $readonly = '';
            $hyouji=file($filename);
            $fp=fopen($filename,'w+');
            $edit_num = '';
            foreach($hyouji as $value)
            {
                $data=explode("<>",$value,4);

                if($data[0]!=$_POST["edit_no"])
                {
                    fputs($fp,$value);
                }
                else
                {

                    $data[1] = date("Y/m/d/D G:i:s");
                    $data[2] = remove_newlines($_POST["edit_name"]);
                    $data[3] = remove_newlines($_POST["edit_comment"]);
                    $new_value=implode("<>",$data) . "\n";
                    fputs($fp,$new_value);
                }

            }
            fclose($fp);
        }

    ?>


    <center>
        <table class="bigtable">
            <tr>
                <td>
                    <form action="mission2-5.php" method="post">
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
                        </table>
                        <br />
                        <input type="submit" value="submit" />
                        <br />
                    </form>
                </td>
                <td>
                    <form action="mission2-5.php" method="post">
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
                                        echo '<td class="hclass">Name</td><td>       
                                              <textarea name="edit_name" rows="1" cols="30">' . 
                                              $edit_name . '</textarea></td>';
                                    }
                                ?>
                            </tr>
                            <tr>
                                    <?php
                                    if($edit_num)
                                    {
                                        echo '<td class="hclass">Comment</td><td>
                                              <textarea name="edit_comment" rows="3" cols="30">' . 
                                              $edit_comment . '</textarea></td>';
                                    }
                                    ?>
                            </tr>
                        </table>
                        <br />
                        <input type="submit" value="Edit entry" />
                    </form>
                </td>
                <td>
                    <form action="mission2-5.php" method="post">

                        <h2>Delete entry:</h2>
                        <table class="formtable">
                            <tr>
                                <td class="hclass">Entry No.</td>
                                <td>
                                    <textarea name="delete_no" cols="30" rows="1"></textarea>
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
        if(!empty($_POST["comment"]) and !empty($_POST["name"]))
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


            $output  = $num . "<>";
            $output .= date("Y/m/d/D G:i:s") . "<>" . htmlentities(remove_newlines($_POST["name"])) 
                       . "<>" . htmlentities(remove_newlines($_POST["comment"])) . "\n";
            $fp=fopen($filename,'a');
            fwrite($fp,$output);
            fclose($fp);
        }
  
        else if(!empty($_POST["delete_no"]))
        {
            $hyouji=file($filename);
            $fp=fopen($filename,'w+');
            foreach($hyouji as $value)
            {
                $data=explode("<>",$value,4);

                if($data[0]!=trim(remove_newlines($_POST["delete_no"])))
                {
                    fputs($fp,$value);
                }
                else
                {
                    $data[2] = '-';
                    $data[3] = 'Deleted';
                    $new_value=implode("<>",$data) . "\n";
                    fputs($fp,$new_value);
                }

            }
            fclose($fp);
        }

        $hyouji=file($filename);
        foreach($hyouji as $value)
        {
            $data=explode("<>",$value,4);
            display_array($data);
        }

        ?>
    </center>
</body>
</html>