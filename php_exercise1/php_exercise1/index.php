    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
    <html>
    <head>
    <link rel="stylesheet" href="style.css" />
        <title>Index of /</title>
    </head>
    <body>
        <h1>Index of /</h1>
        <ul>
            <li>
                <a href="check.html">check.html</a>
            </li>
            <li>
                <a href="mission1/kadai1-2.txt">kadai1-2.txt</a>
            </li>
            <li>
                <a href="mission1/kadai1-5.txt">kadai1-5.txt</a>
            </li>
            <li>
                <a href="mission1/kadai1-6.txt">kadai1-6.txt</a>
            </li>
            <li>
                <a href="mission2/kadai2-1.txt">kadai2-1.txt</a>
            </li>
            <?php
            for($i = 1; $i <= 7; $i++)
            {
                echo "<li>";
                echo "<a href='mission1/mission1-" . $i;
                echo ".php'>mission1-" . $i;
                echo ".php</a>";
                echo "</li>";
            }
            for($i = 1; $i <= 15; $i++)
            {
                echo "<li>";
                echo "<a href='mission2/mission2-" . $i;
                echo ".php'>mission2-" . $i;
                echo ".php</a>";
                echo "</li>";
            }
            ?>
        </ul>

    </body>
    </html>








