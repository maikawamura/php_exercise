
<html>
<head>
    <link rel="stylesheet" href="../style.css" />
</head>
<body>
    <form action="mission1-4.php" method="post">

    <textarea name="comment" cols="30" rows="3"></textarea><br/>
    <input type="submit" value="submit">
        
    </form>
    

    Welcome  <br>
    Your comment is: <?php echo $_POST["comment"]; ?>
</body>
</html>