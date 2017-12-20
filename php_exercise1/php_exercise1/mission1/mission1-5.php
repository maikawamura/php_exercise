
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <form action="mission1-5.php" method="post">

        <textarea name="comment" cols="30" rows="3"></textarea>
        <br />
        <input type="submit" value="submit" />

    </form>
    <?php
    $filename='kadai1-5.txt';
    $fp=fopen($filename,'w');
    fwrite($fp,$_POST["comment"]);
    fclose($fp);
    ?>
</body>
</html>