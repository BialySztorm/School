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
                    @$connection->query("DELETE FROM `dyspozytorzy` WHERE `dyspozytorzy`.`dyspozytor_id` = $id");
                } catch (Error $e) {
                }
            }
            if (isset($_POST['imie'])&&isset($_POST['nazwisko'])&&isset($_POST['stanowisko'])) {
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $stanowisko = $_POST['stanowisko'];
                try {
                    @$connection->query("INSERT INTO dyspozytorzy (`dyspozytor_imie`,`dyspozytor_nazwisko`,`dyspozytor_stanowisko`) VALUES ('$imie','$nazwisko','$stanowisko')");
                } catch (Error $e) {
                }
            }
            try {

                $dane = @$connection->query("SELECT * FROM dyspozytorzy");
                echo "<table class='dyspozytorzy'><tr><th>dyspozytor:</th><th>stanowisko:</th></tr>";
                while ($curr_line = $dane->fetch_assoc()) {
                    echo '<tr class="dyspozytor">';
                    echo '<td>' . $curr_line['dyspozytor_imie'] . " " . $curr_line['dyspozytor_nazwisko'] . "</td><td>" . $curr_line['dyspozytor_stanowisko'] . "</td>";
                    echo '</tr>';
                }
                echo "</table>";
            } catch (Error $e) {
                echo "<h1> Error" . $e . "</h1>";
            }
            try {

                echo "<form action='dyspozytorzy.php' method='POST'>";
                echo "<input type='text' name='imie' placeholder='Imię'>";
                echo "<input type='text' name='nazwisko' placeholder='Nazwisko'>";
                echo "<input type='text' name='stanowisko' placeholder='Stanowisko'>";
                echo "<input type='submit' value='Dodaj'>";
                echo "</form>";
            } catch (Error $e) {
                echo "<h1> Error" . $e . "</h1>";
            }
            try {

                $dane = @$connection->query("SELECT * FROM dyspozytorzy");
                echo "<form action='dyspozytorzy.php' method='POST'>";
                echo "<select name='id'>";
                try {
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo '<option value="' . $curr_line['dyspozytor_id'] . '" >' . $curr_line['dyspozytor_imie'] . " " . $curr_line['dyspozytor_nazwisko'] . '</option>';
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