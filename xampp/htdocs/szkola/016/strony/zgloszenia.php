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
        require_once('connection.php');
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            if (isset($_POST['opis'])&&isset($_POST['data'])&&isset($_POST['zespol'])&&isset($_POST['dyspozytor'])) {
                $opis= $_POST['opis'];
                $data = $_POST['data'];
                $zespol = $_POST['zespol'];
                $dyspozytor = $_POST['dyspozytor'];
                try {
                    @$connection->query("INSERT INTO zgloszenia (`zgloszenie_opis`,`zgloszenie_data`,`zgloszenie_zespol`,`zgloszenie_dyspozytor`) VALUES ('$opis','$data','$zespol','$dyspozytor')");
                } catch (Error $e) {
                }
            }
            try {
                echo "<form action='zgloszenia.php' method='POST'>";
                echo "<input type='text' name='opis' placeholder='Opis'>";
                echo "<input type='date' name='data'>";
                $dane = @$connection->query("SELECT * FROM zespoly");
                echo "<select name='zespol'>";
                try {
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo '<option value="' . $curr_line['zespol_ID'] . '" >' . $curr_line['zespol_nazwa'] . '</option>';
                    }
                } catch (Error $e) {
                }
                echo "</select>";
                $dane = @$connection->query("SELECT * FROM dyspozytorzy");
                echo "<select name='dyspozytor'>";
                try {
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo '<option value="' . $curr_line['dyspozytor_id'] . '" >' . $curr_line['dyspozytor_imie'] . " " . $curr_line['dyspozytor_nazwisko'] . '</option>';
                    }
                } catch (Error $e) {
                }
                echo "</select>";
                echo "<input type='submit' value='Dodaj zgłoszenie'>";
                echo "</form>";
            } catch (Error $e) {
                echo "<h1> Error" . $e . "</h1>";
            }
            try {

                $dane = @$connection->query("SELECT zgloszenia.zgloszenie_id, zgloszenia.zgloszenie_opis, zgloszenia.zgloszenie_data, zespoly.zespol_nazwa, dyspozytorzy.dyspozytor_imie, dyspozytorzy.dyspozytor_nazwisko, dyspozytorzy.dyspozytor_stanowisko FROM zgloszenia INNER JOIN zespoly ON zgloszenia.zgloszenie_zespol = zespoly.zespol_ID INNER JOIN dyspozytorzy ON zgloszenia.zgloszenie_dyspozytor = dyspozytorzy.dyspozytor_id");
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