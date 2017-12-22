<title>mission2-3</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <center>
        <form action="mission2-3.php" method="post">
            <table>
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
        $filename='kadai2-3.txt';
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
            $output .= htmlspecialchars($_POST["name"]) . "<>" . date("Y/m/d/D G:i:s") . "<>" . htmlspecialchars($_POST["comment"]) . "\n";
            $fp=fopen($filename,'a');
            fwrite($fp,$output);
            fclose($fp);


        }
        $hyouji=file($filename);
        foreach($hyouji as $value)
        {
            $data=explode("<>",$value,4);


            echo '
            <table style="width: 400px">
                <tr>
                    <td class="hclass">No.' . $data[0] . '</td>
                    <td>' . $data[2] . '</td>
                </tr>
                <tr>
                    <td class="hclass">name:</td>
                    <td>' . $data[1] . '</td>
                </tr>
                <tr>
                    <td class="hclass">comment:</td>
                    <td>' . $data[3] . '</td>
                </tr>
            </table>
            <br/><br/>';
        }

        ?>
    </center>
</body>
</html>