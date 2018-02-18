
<title>mission2-13</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <h4>Edit page</h4>    
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
        $nm="mai";
        $kome="edit comment";

        $sql="update tbtest set name='$nm',comment='$kome' where id='$id';";
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