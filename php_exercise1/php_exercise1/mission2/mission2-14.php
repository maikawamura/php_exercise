
<title>mission2-14</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <h4>Delete page</h4>
    <?php
    //tutorial code from w3schools.com
    $dsn = 'mysql:dbname=co_575_it_99sv_coco_com;host=localhost;charset=utf8';
    $username = 'co-575.it.99sv-coco.com';
    $password = 'oIu9bW';
    try
    {
        $conn = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id=1;
        $sql="delete from tbtest where id='$id';";
        $results=$conn->query($sql);
    }
    catch(PDOException $e)
    {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    ?>
</body>
</html>