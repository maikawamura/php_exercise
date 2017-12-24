<title>mission2-4</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <center>
        <form action="mission2-4.php" method="post">
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
            </table>
            <br />
            <input type="submit" value="submit" />
            <br />
        </form>

        <form action="mission2-4.php" method="post">

            <h2>Delete entry:</h2>
            <table class="formtable">
                <tr>
                    <td class="hclass">Entry No.</td>
                    <td>
                        <textarea name="entry_number" cols="30" rows="1"></textarea>
                    </td>
                </tr>
            </table>
            <br />
            <input type="submit" value="submit" />

        </form>

        <?php
        require 'mission2.h.php';

        $filename='kadai2-4.txt';
        fclose(fopen($filename,"a"));
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
            date_default_timezone_set('Asia/Tokyo');
            $output .= date("Y/m/d/D G:i:s") . "<>" . htmlentities($_POST["name"]) . "<>" . htmlentities($_POST["comment"]) . "\n";
            $fp=fopen($filename,'a');
            fwrite($fp,$output);
            fclose($fp);
        }

        else if(!empty($_POST["entry_number"]))
        {
            $hyouji=file($filename);
            $fp=fopen($filename,'w+');
            foreach($hyouji as $value)
            {
                $data=explode("<>",$value,4);

                if($data[0]!=$_POST["entry_number"])
                {
                    fputs($fp,$value);
                }
                else
                {
                    //$data[1] = '';
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