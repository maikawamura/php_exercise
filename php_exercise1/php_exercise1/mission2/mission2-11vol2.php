<?php
//�f�[�^�x�[�X�ւ̐ڑ�
//PDO�𗘗p����Mysql�ڑ��T���v��
//mysql:dbname=DB��;host=host��;port=�|�[�g�ԍ�
$dsn = 'mysql:dbname=co_578_it_99sv_coco_com;host=localhost';//DB��Mysql�ADB���Ehost�����w��B
$user = 'co-578.it.99sv-c';//DB�ɐڑ����邽�߂̃��[�U�[��(�A�J�E���g��)��ݒ�
$password = '9Jbi7wa';//DB�ɐڑ����邽�߂̃p�X���[�h��ݒ�
//try{//�ڑ��`�F�b�N
$pdo = new PDO($dsn, $user, $password);//�f�[�^�[�x�[�X�ɐڑ�
$stmt=$pdo->query('SET NAMES utf8');//���������΍�
//�����ɏ������L��
$sql=$pdo->prepare("INSERT INTO tbtest(id,name,comment)VALUES('1',:name,:comment);");
$sql->bindParam(":name",$name,PDO::PARAM_STR);
$sql->bindParam(":comment",$comment,PDO::PARAM_STR);
$name="�k�l�̌�";
$comment="���O�͂�������ł���";
$sql->execute();

$pdo = null;//�ڑ��I��
//}catch (PDOException $e){//�ڑ��Ɏ��s�����ۂ̃G���[����
//	print('�G���[���������܂����B:'.$e->getMessage());
//	die();
//}

//�e�[�u���쐬

closeCursor();

?>