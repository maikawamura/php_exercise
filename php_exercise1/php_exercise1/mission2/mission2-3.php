<title>mission2-3</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <center>
        <form action="mission2-3.php" method="post">
            <table class="formtable">
                <tr>
                    <td class="hclass">name</td>
                    <td>
                        <textarea name="name" cols="30" rows="1"></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="hclass">comment</td>
                    <td>
                        <textarea name="comment" cols="30" rows="3"></textarea>
                    </td>
            </table>
            <br />
            <input type="submit" value="submit" />
            
        </form>

        <?php
        require 'mission2.h.php';

        $filename='kadai2-3.txt';
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