
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <center>
    <form action="mission1-7.php" method="post">

        <textarea name="comment" cols="30" rows="3"></textarea>
        <br />
        <input type="submit" value="submit" />

    </form>

    <?php
        $filename='kadai1-7.txt';
        $fp=fopen($filename,'a');
        $output = $_POST["comment"] . "\n";
        fwrite($fp,$output);
        fclose($fp);

        $hyouji=file($filename);
        foreach($hyouji as $value)
        {
            print $value . "<br />";    
        }


    ?>
        </center>
</body>
</html>