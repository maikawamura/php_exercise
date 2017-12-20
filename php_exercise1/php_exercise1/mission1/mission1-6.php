
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <form action="mission1-6.php" method="post">

        <textarea name="comment" cols="30" rows="3"></textarea>
        <br />
        <input type="submit" value="submit" />

    </form>
    <?php
    $filename='kadai1-6.txt';
    $fp=fopen($filename,'a');

    $output = $_POST["comment"] . "\n";
    fwrite($fp,$output);
    
    fclose($fp);
    ?>
</body>
</html>
