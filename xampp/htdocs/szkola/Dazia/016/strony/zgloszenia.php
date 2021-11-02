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
        $connection = mysqli_connect('localhost', 'root');
        mysqli_select_db($connection, 'baza1');

        echo "<form action='zgloszenia_1.php' method='POST'>";
        echo "<input type='text' name='opis' placeholder='Opis'>";
        echo "<input type='date' name='data'>";
        $dane = $dane = mysqli_query($connection, "SELECT * FROM zespoly");
        echo "<select name='zespol'>";

        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo '<option value="' . $curr_line['zespol_ID'] . '" >' . $curr_line['zespol_nazwa'] . '</option>';
        }

        echo "</select>";
        $dane = $dane = mysqli_query($connection, "SELECT * FROM dyspozytorzy");
        echo "<select name='dyspozytor'>";

        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo '<option value="' . $curr_line['dyspozytor_id'] . '" >' . $curr_line['dyspozytor_imie'] . " " . $curr_line['dyspozytor_nazwisko'] . '</option>';
        }
        echo "</select>";
        echo "<input type='submit' value='Dodaj zgłoszenie'>";
        echo "</form>";

        mysqli_close($connection);
        ?>
    </center>
    <div class="footer">
        <div onclick="document.location='dyspozytorzy.php'">Wyświetlanie zgłoszeń dyspozytorów</div>
        <div onclick="document.location='zgloszenia.php'">Dodawanie zgłoszeń</div>
        <div onclick="document.location='../menu.php'">Menu główne</div>
    </div>
</body>

</html>