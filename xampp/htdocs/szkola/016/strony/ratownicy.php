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
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                try {
                    @$connection->query("DELETE FROM `ratownicy` WHERE `ratownicy`.`ratownik_id` = $id");
                } catch (Error $e) {
                }
            }
            if (isset($_POST['imie'])&&isset($_POST['nazwisko'])&&isset($_POST['zespol'])) {
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $zespol = $_POST['zespol'];
                try {
                    @$connection->query("INSERT INTO ratownicy (`ratownik_imie`,`ratownik_nazwisko`,`ratownik_zespol`) VALUES ('$imie','$nazwisko','$zespol')");
                } catch (Error $e) {
                }
            }
            try {

                $dane = @$connection->query("SELECT ratownicy.ratownik_imie,ratownicy.ratownik_nazwisko, zespoly.zespol_nazwa FROM ratownicy INNER JOIN zespoly ON ratownicy.ratownik_zespol = zespoly.zespol_ID");
                echo "<table class='ratownicy'><tr><th>Ratownik:</th><th>Zespół:</th></tr>";
                while ($curr_line = $dane->fetch_assoc()) {
                    echo '<tr class="ratownik">';
                    echo '<td>' . $curr_line['ratownik_imie'] . " " . $curr_line['ratownik_nazwisko'] . "</td><td>" . $curr_line['zespol_nazwa'] . "</td>";
                    echo '</tr>';
                }
                echo "</table>";
            } catch (Error $e) {
                echo "<h1> Error" . $e . "</h1>";
            }
            try {

                $dane = @$connection->query("SELECT * FROM zespoly");
                echo "<form action='ratownicy.php' method='POST'>";
                echo "<select name='zespol'>";
                try {
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo '<option value="' . $curr_line['zespol_ID'] . '" >' . $curr_line['zespol_nazwa'] . '</option>';
                    }
                } catch (Error $e) {
                }
                echo "</select>";
                echo "<input type='text' name='imie' placeholder='Imię'>";
                echo "<input type='text' name='nazwisko' placeholder='Nazwisko'>";
                echo "<input type='submit' value='Dodaj'>";
                echo "</form>";
            } catch (Error $e) {
                echo "<h1> Error" . $e . "</h1>";
            }
            try {

                $dane = @$connection->query("SELECT * FROM ratownicy");
                echo "<form action='ratownicy.php' method='POST'>";
                echo "<select name='id'>";
                try {
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo '<option value="' . $curr_line['ratownik_id'] . '" >' . $curr_line['ratownik_imie'] . " " . $curr_line['ratownik_nazwisko'] . '</option>';
                    }
                } catch (Error $e) {
                }
                echo "</select>";
                echo "<input type='submit' value='Usuń'>";
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