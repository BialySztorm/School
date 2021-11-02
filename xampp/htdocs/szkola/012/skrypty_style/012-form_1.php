<html>

<head>
    <link rel="stylesheet" href="012.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    require_once('connection.php');

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);

        if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['stanowisko'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $stanowisko = $_POST['stanowisko'];
            $connection->query('INSERT INTO pracownicy (`imie`, `nazwisko`, `stanowisko`) VALUES ("' . $imie . '", "' . $nazwisko . '", "' . $stanowisko . '")');
            $connection->close();
        }
    } catch (Error $e) {
        echo "<h1> Error" . $e . "</h1>";
    }
    if ($stanowisko == "1") {


        echo '<form action="012-form.php" method="POST">';
        echo '<input type="date" name="ure" placeholder="Data końcowa świadectwa URE">';
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $dane = @$connection->query("SELECT `id_pracownika` FROM `pracownicy` WHERE `imie` = '$imie' AND `nazwisko` = '$nazwisko'");
            while ($curr_line = $dane->fetch_assoc())
                echo '<input type="number" name="id" placeholder="ID pracownika" value="' . $curr_line['id_pracownika'] . '" readonly style="display:none">';
            $connection->close();
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
        echo '<input type="submit" value="Zatwierdź">';
        echo '</form>';
    } else {
        echo '<input type="button" onclick="document.location=`012-form.php`" value="Zatwierdź">';
    }

    ?>
</body>

</html>