<html>

<head>
    <link rel="stylesheet" href="011.css">
    <meta charset="UTF-8">
</head>

<body>
    
    <div>
        <form action="011.php" method="POST">
            <input type="text" name="firma" placeholder="Firma">
            <input type="text" name="silnik" placeholder="Silnik">
            <select name="jezyk" placeholder="Język programowania">
            <?php
            require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection -> query ('SET NAMES utf8');
                    $connection -> query ('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT * FROM `language`");
                    while($curr_line = $dane->fetch_assoc()) {
                        echo "<option value='".$curr_line['ID_Language']."'>".$curr_line['Language']."</option>";
                    }
                    $dane->free_result();
                    $connection->close();
                } catch(Error $e) {
                echo "<h1> Error".$e."</h1>";
                }
            ?>
            </select>
            <input type="text" name="vs" placeholder="Skrypty wizualne">
            <input type="submit" value="Zatwierdź">
        </form>
    </div>
</body>

</html>