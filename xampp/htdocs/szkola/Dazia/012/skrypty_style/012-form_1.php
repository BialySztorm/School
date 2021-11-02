<html>

<head>
    <link rel="stylesheet" href="012.css">
    <meta charset="UTF-8">
</head>

<body>
    <div>
        <?php
        $con = mysqli_connect('localhost', 'root');
        mysqli_select_db($con, 'baza');
        if (isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['stanowisko'])) {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $stanowisko = $_POST['stanowisko'];
            mysqli_query($con, 'INSERT INTO pracownicy (`imie`, `nazwisko`, `stanowisko`) VALUES ("' . $imie . '", "' . $nazwisko . '", "' . $stanowisko . '")');
        }

        if ($stanowisko == "1") {
            echo '<form action="012-form.php" method="POST">';
            echo '<input type="date" name="ure" placeholder="Data końcowa świadectwa URE">';
            $dane = mysqli_query($con, "SELECT `id_pracownika` FROM `pracownicy` WHERE `imie` = '$imie' AND `nazwisko` = '$nazwisko'");
            while ($curr_line = mysqli_fetch_assoc($dane))
                echo '<input type="number" name="id" placeholder="ID pracownika" value="' . $curr_line['id_pracownika'] . '" readonly style="display:none">';
            mysqli_close($con);

            echo '<input type="submit" value="Zatwierdź">';
            echo '</form>';
        } else {
            echo '<input type="button" onclick="document.location=`012-form.php`" value="Zatwierdź">';
        }

        ?>
    </div>
</body>

</html>