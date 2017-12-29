
<title>mission2-8</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
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
        echo "Connected successfully<br/><br/>";

        $drop = "DROP TABLE tbtest";
        $conn->exec($drop);

        $sql="CREATE TABLE tbtest(
                id INT,
                name VARCHAR(255) NOT NULL,
                comment VARCHAR(255)
                )";


        $conn->exec($sql);
        echo "Table created successfully";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    ?>
</body>
</html>