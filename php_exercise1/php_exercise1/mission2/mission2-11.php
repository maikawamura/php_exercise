
<title>mission2-11</title>
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <h4>Insert page</h4>
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

        $sql=$conn->prepare("INSERT INTO tbtest(id,name,comment) VALUES('1',:name,:comment);");
        $sql->bindParam(':name',$name,PDO::PARAM_STR);
        $sql->bindParam(':comment',$comment,PDO::PARAM_STR);

        $name='mai';
        $comment='comment';
        $sql->execute();

        if(PDOStatement)
        {
            echo "Data inserted successfully";
        }
        else 
        { 
            echo "error"; 
        }
    }
    catch(PDOException $e)
    {
        echo "<br>" . $e->getMessage();
    }

    $conn = null;
    ?>
</body>
</html>