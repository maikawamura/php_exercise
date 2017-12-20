<title>mission2-1</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <center>
        <form action="mission2-1.php" method="post">
            <table>
                <tr>
                    <td>name</td>
                    <td><textarea name="name" cols="30" rows="1"></textarea></td>
                </tr>
                <tr>
                    <td>comment</td>
                    <td><textarea name="comment" cols="30" rows="3"></textarea></td>
            </table>
            <br />
            <input type="submit" value="submit" />

        </form>

        <?php
        $filename='kadai2-1.txt';
        if(!empty($_POST["comment"]) and !empty($_POST["name"]))
        {
            $fp=fopen($filename,'a');
            $output =$_POST["name"] . ": " . $_POST["comment"] . "\n";
            fwrite($fp,$output);
            fclose($fp);


        }
        $hyouji=file($filename);
        foreach($hyouji as $value)
        {
            print $value . "<br />";
        }

        ?>
    </center>
</body>
</html>