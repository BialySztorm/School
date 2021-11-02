<html>

<head>
    <link rel="stylesheet" href="014.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if (isset($_POST['id'])) {
        require_once('connection.php');
        $id = $_POST['id'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query("DELETE FROM `samochody` WHERE `id` = $id");
            $connection->close();
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <div>
        <form action="014-delete.php" method="POST">
            <select name="id" placeholder="ID">
                <?php
                require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection->query('SET NAMES utf8');
                    $connection->query('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT samochody.id, marki.marka, samochody.model FROM samochody INNER JOIN marki ON samochody.marka = marki.id_marki");
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo "<option value='" . $curr_line['id'] . "'>" . $curr_line['marka'] . " " . $curr_line['model'] . "</option>";
                    }

                    $connection->close();
                } catch (Error $e) {
                    echo "<h1> Error" . $e . "</h1>";
                }
                ?>
            </select>
            <input type="submit" value="Zatwierdź">
        </form>
    </div>
</body>

</html>