<html>

<head>
    <link rel="stylesheet" href="012.css">
    <meta charset="UTF-8">
</head>

<body>

    <div>
        <form action="012-change.php" method="POST">
            <select name="id" placeholder="ID">
                <?php
                require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection->query('SET NAMES utf8');
                    $connection->query('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT id_pracownika, imie, nazwisko, stanowisko FROM `pracownicy`");
                    while ($curr_line = $dane->fetch_assoc()) {
                        if ($curr_line['stanowisko'] == 1)
                            echo "<option value='" . $curr_line['id_pracownika'] . "'>" . $curr_line['imie'] . " " . $curr_line['nazwisko'] . "</option>";
                    }

                    $connection->close();
                } catch (Error $e) {
                    echo "<h1> Error" . $e . "</h1>";
                }
                ?>
            </select>
            <input type="date" name="ure" placeholder="URE">
            <input type="submit" value="Zatwierdź">
        </form>
    </div>
    <?php
    if (isset($_POST['id']) && isset($_POST['ure'])) {
        require_once('connection.php');
        $id = $_POST['id'];
        $ure = $_POST['ure'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query("UPDATE `ure` SET `data_uprawnien` = '$ure' WHERE `ure`.`id_pracownika` = $id ;");
            $connection->close();
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
</body>

</html>