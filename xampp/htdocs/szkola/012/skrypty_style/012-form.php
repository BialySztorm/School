<html>

<head>
    <link rel="stylesheet" href="012.css">
    <meta charset="UTF-8">
</head>

<body>

    <?php
    if (isset($_POST['id']) && isset($_POST['ure'])) {
        require_once('connection.php');
        $id = $_POST['id'];
        $ure = $_POST['ure'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query('INSERT INTO ure (`id_pracownika`, `data_uprawnien`) VALUES ("' . $id . '", "' . $ure . '")');
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <div>
        <form action="012-form_1.php" method="POST">
            <input type="text" name="imie" placeholder="Imię">
            <input type="text" name="nazwisko" placeholder="Nazwisko">
            <select name="stanowisko" placeholder="Stanowisko">
                <?php
                require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection->query('SET NAMES utf8');
                    $connection->query('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT * FROM `stanowiska`");
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo "<option value='" . $curr_line['id_stanowiska'] . "'>" . $curr_line['nazwa_stanowiska'] . "</option>";
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