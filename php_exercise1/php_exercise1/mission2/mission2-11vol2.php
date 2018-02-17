<?php
//データベースへの接続
//PDOを利用したMysql接続サンプル
//mysql:dbname=DB名;host=host名;port=ポート番号
$dsn = 'mysql:dbname=co_578_it_99sv_coco_com;host=localhost';//DBにMysql、DB名・host名を指定。
$user = 'co-578.it.99sv-c';//DBに接続するためのユーザー名(アカウント名)を設定
$password = '9Jbi7wa';//DBに接続するためのパスワードを設定
//try{//接続チェック
$pdo = new PDO($dsn, $user, $password);//データーベースに接続
$stmt=$pdo->query('SET NAMES utf8');//文字化け対策
//ここに処理を記載
$sql=$pdo->prepare("INSERT INTO tbtest(id,name,comment)VALUES('1',:name,:comment);");
$sql->bindParam(":name",$name,PDO::PARAM_STR);
$sql->bindParam(":comment",$comment,PDO::PARAM_STR);
$name="北斗の拳";
$comment="お前はもう死んでいる";
$sql->execute();

$pdo = null;//接続終了
//}catch (PDOException $e){//接続に失敗した際のエラー処理
//	print('エラーが発生しました。:'.$e->getMessage());
//	die();
//}

//テーブル作成

closeCursor();

?>