<html>

<head>
    <link rel="stylesheet" href="../style/submain.css">
    <title>Przegląd zespołów medycznych</title>
    <link rel="shortcut icon" href="../grafika/AM.ico" />
    <meta charset="UTF-8">
</head>

<body>
<center>
    <?php
    $zespol = $_POST['zespol'];
    require_once('connection.php');
    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            try {
                @$connection->query("DELETE FROM `zgloszenia` WHERE `zgloszenia`.`zgloszenie_id` = $id");
            } catch (Error $e) {
            }
        }
        try {

            $dane = @$connection->query("SELECT zespoly.zespol_nazwa,zespoly.zespol_lekarz FROM zespoly Where zespoly.zespol_ID Like $zespol");
            while ($curr_line = $dane->fetch_assoc()) {
                echo '<div class="zespol">';
                echo $curr_line['zespol_nazwa'] . ", Lekarz dowodzący: " . $curr_line['zespol_lekarz'];
                echo '</div>';
            }
        } catch (Error $e) {
            echo "<h1> Error" . $e . "</h1>";
        }
        try {

            $dane = @$connection->query("SELECT ratownicy.ratownik_imie,ratownicy.ratownik_nazwisko FROM ratownicy Where ratownicy.ratownik_zespol Like $zespol");
            echo "<table class='ratownicy'><tr><th>Ratownicy:</th></tr>";
            while ($curr_line = $dane->fetch_assoc()) {
                echo '<tr class="ratownik">';
                echo '<td>'.$curr_line['ratownik_imie'] . " " . $curr_line['ratownik_nazwisko']."</td>";
                echo '</tr>';
            }
            echo "</table>";
        } catch (Error $e) {
            echo "<h1> Error" . $e . "</h1>";
        }
        try {

            $dane = @$connection->query("SELECT zgloszenia.zgloszenie_id, zgloszenia.zgloszenie_opis, zgloszenia.zgloszenie_data, zespoly.zespol_nazwa, dyspozytorzy.dyspozytor_imie, dyspozytorzy.dyspozytor_nazwisko, dyspozytorzy.dyspozytor_stanowisko FROM zgloszenia INNER JOIN zespoly ON zgloszenia.zgloszenie_zespol = zespoly.zespol_ID INNER JOIN dyspozytorzy ON zgloszenia.zgloszenie_dyspozytor = dyspozytorzy.dyspozytor_id WHERE zgloszenia.zgloszenie_zespol Like $zespol");
            echo "<table cellspacing='10'>";
            echo "<tr><th>ID:</th><th>Opis:</th><th>Data:</th><th>Zespół:</th><th>Dyspozytor:</th></tr>";
            try {
                while ($curr_line = $dane->fetch_assoc()) {
                    echo '<tr>';
                    echo "<td>" . $curr_line['zgloszenie_id'] . "</td><td>" . $curr_line['zgloszenie_opis'] . "</td><td>" . $curr_line["zgloszenie_data"] . "</td><td>" . $curr_line['zespol_nazwa'] . "</td><td>" . $curr_line['dyspozytor_imie'] . " " . $curr_line['dyspozytor_nazwisko'] . " st. " . $curr_line['dyspozytor_stanowisko'] . "</td>";
                    echo '</tr>';
                }
            } catch (Error $e) {
            }
            echo "</table>";
        } catch (Error $e) {
            echo "<h1> Error" . $e . "</h1>";
        }
        try {

            $dane = @$connection->query("SELECT zgloszenia.zgloszenie_id FROM zgloszenia Where zgloszenia.zgloszenie_zespol Like $zespol");
            echo "<form action='zespol.php' method='POST'>";
            echo "<select name='id'>";
            try {
                while ($curr_line = $dane->fetch_assoc()) {
                    echo '<option value="' . $curr_line['zgloszenie_id'] . '" >ID: ' . $curr_line['zgloszenie_id'] . '</option>';
                }
            } catch (Error $e) {
            }
            echo "</select>";
            echo "<input style='display:none;' type='text' name='zespol' value='". $zespol."'>";
            echo "<input type='submit' value='Zatwierdź wysłanie jednostki'>";
            echo "</form>";
        } catch (Error $e) {
            echo "<h1> Error" . $e . "</h1>";
        }
    } catch (Error $e) {
        echo "<h1> Error" . $e . "</h1>";
    }

    ?>
    </center>
    <div class="footer">
        <div onclick="document.location='ratownicy.php'">Edycja ratowników</div>
        <div onclick="document.location='dyspozytorzy.php'">Edycja dyspozytorów</div>
        <div onclick="document.location='zgloszenia.php'">Dodawanie zgłoszeń</div>
        <div onclick="document.location='../menu.php'">Menu główne</div>
    </div>
</body>

</html>