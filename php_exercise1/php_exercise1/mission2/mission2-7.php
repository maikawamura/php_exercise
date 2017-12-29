<?php
//データベースへの接続
//mysql:dbname = co_575_it_99sv_coco_com
//host = localhost
//user name = co-575.it.99sv-coco.com
//password = oIu9bW

$dsn = 'mysql:dbname=co_575_it_99sv_coco_com;host=localhost;charset=UTF-8';
$user = 'co-575.it.99sv-coco.com';
$password = 'oIu9bW';
$pdo = new PDO($dsn,$user,$password);

$sql = "CREATE TABLE tbtest"
"("
"id INT,"
"name char(32),"
"comment TEXT"
");";
4stmt = $pdo->query($sql);
?>