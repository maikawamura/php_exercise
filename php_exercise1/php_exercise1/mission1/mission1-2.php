
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>

</body>
</html>

<?php

$filename='kadai1-2.txt';
$fp=fopen($filename,'w');
echo $filename;

fwrite($fp,'test');
fclose($fp);
?>