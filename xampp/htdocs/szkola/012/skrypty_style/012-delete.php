<html>

<head>
    <link rel="stylesheet" href="012.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if (isset($_POST['id'])) {
        require_once('connection.php');
        $id = $_POST['id'];
        $id0 = $id[0];
        $id1 = explode(" ", $id)[1];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($id0 == 1) {
                try {
                    $connection->query("DELETE FROM `ure` WHERE `ure`.`id_pracownika` = $id1");
                } catch (Error $e) {
                    echo "<h1> Insertion Error" . $e . "</h1>";
                }
            }
            $connection->query("DELETE FROM `pracownicy` WHERE `pracownicy`.`id_pracownika` = $id1");
            $connection->close();
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <div>
        <form action="012-delete.php" method="POST">
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
                        echo "<option value='" . $curr_line['stanowisko'] . " " . $curr_line['id_pracownika'] . "'>" . $curr_line['imie'] . " " . $curr_line['nazwisko'] . "</option>";
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