    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
    <html>
    <head>
    <link rel="stylesheet" href="style.css" />
        <title>Index</title>
    </head>
    <body>
        <h1>Index</h1>
        <center>
            <table class="bigtable">
                <tr>
                    <td>
                        <h2>mission1</h2>
                        <ul>
                            <li>
                                <a href="mission1/kadai1-2.txt">kadai1-2.txt</a>
                            </li>
                            <li>
                                <a href="mission1/kadai1-5.txt">kadai1-5.txt</a>
                            </li>
                            <li>
                                <a href="mission1/kadai1-6.txt">kadai1-6.txt</a>
                            </li>
                            <?php
                            for($i = 1; $i <= 7; $i++)
                            {
                                echo "<li>
                        <a href='mission1/mission1-" . $i .
                                ".php'>mission1-" . $i .
                                ".php</a>
                        </li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <h2>mission2</h2>
                        <ul>
                            <li>
                                <a href="mission2/kadai2-1.txt">kadai2-1.txt</a>
                            </li>
                            <?php
                            for($i = 1; $i <= 15; $i++)
                            {
                                echo "<li>
                        <a href='mission2/mission2-" . $i .
                                ".php'>mission2-" . $i .
                                ".php</a>
                        </li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <h2>mission3</h2>
                        <ul>
                            <?php
                            for($i = 1; $i <= 10; $i++)
                            {
                                echo "<li>
                        <a href='mission3/mission3-" . $i .
                                ".php'>mission3-" . $i .
                                ".php</a>
                        </li>";
                            }
                            ?>
                        </ul>
                    </td>
                </tr>
            </table>
        </center>
        
    </body>
    </html>