<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body></body>
</html>

<?php

$filename='kadai1-2.txt';

$fp=fopen($filename,'r');
//echo fread($fp,filesize($filename));
fpassthru($fp);

fclose($fp);
?>