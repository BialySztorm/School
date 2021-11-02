<html>

<head>
    <link rel="stylesheet" href="014.css">
    <meta charset="UTF-8">
</head>

<body>

    <?php
    if (isset($_POST['model']) && isset($_POST['marka'])) {
        require_once('connection.php');
        $model = $_POST['model'];
        $marka = $_POST['marka'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query('INSERT INTO samochody (`model`, `marka`) VALUES ("' . $model . '", "' . $marka . '")');
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <div>
        <form action="014-form.php" method="POST">
            <select name="marka" placeholder="Marka">
                <?php
                require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection->query('SET NAMES utf8');
                    $connection->query('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT * FROM `marki`");
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo "<option value='" . $curr_line['id_marki'] . "'>" . $curr_line['marka'] . "</option>";
                    }

                    $connection->close();
                } catch (Error $e) {
                    echo "<h1> Error" . $e . "</h1>";
                }
                ?>
            </select>
            <input type="text" name="model" placeholder="Model">
            <input type="submit" value="Zatwierdź">
        </form>
    </div>

</body>

</html>