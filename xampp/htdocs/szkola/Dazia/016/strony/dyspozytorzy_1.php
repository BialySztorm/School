<html>

<head>
    <link rel="stylesheet" href="../style/submain.css">
    <title>Przegląd zespołów medycznych</title>
    <meta charset="UTF-8">
</head>

<body>
    <center>
        <?php
        if (isset($_POST['dyspozytorzy'])) {
            $dyspozytorzy = $_POST['dyspozytorzy'];
            $connection = mysqli_connect('localhost', 'root');
            mysqli_select_db($connection, 'baza1');


            $dane = $dane = mysqli_query($connection, "SELECT zgloszenia.zgloszenie_id, zgloszenia.zgloszenie_opis, zgloszenia.zgloszenie_data, zespoly.zespol_nazwa, dyspozytorzy.dyspozytor_imie, dyspozytorzy.dyspozytor_nazwisko, dyspozytorzy.dyspozytor_stanowisko FROM zgloszenia INNER JOIN zespoly ON zgloszenia.zgloszenie_zespol = zespoly.zespol_ID INNER JOIN dyspozytorzy ON zgloszenia.zgloszenie_dyspozytor = dyspozytorzy.dyspozytor_id WHERE $dyspozytorzy");
            echo "<table cellspacing='10'>";
            echo "<tr><th>ID:</th><th>Opis:</th><th>Data:</th><th>Zespół:</th><th>Dyspozytor:</th></tr>";

            while ($curr_line = mysqli_fetch_assoc($dane)) {
                echo '<tr>';
                echo "<td>" . $curr_line['zgloszenie_id'] . "</td><td>" . $curr_line['zgloszenie_opis'] . "</td><td>" . $curr_line["zgloszenie_data"] . "</td><td>" . $curr_line['zespol_nazwa'] . "</td><td>" . $curr_line['dyspozytor_imie'] . " " . $curr_line['dyspozytor_nazwisko'] . " st. " . $curr_line['dyspozytor_stanowisko'] . "</td>";
                echo '</tr>';
            }
            echo "</table>";
            mysqli_close($connection);
        }
        ?>
        <button onclick="document.location='dyspozytorzy.php'">Powrót</button>
    </center>
    <div class="footer">
        <div onclick="document.location='dyspozytorzy.php'">Wyświetlanie zgłoszeń dyspozytorów</div>
        <div onclick="document.location='zgloszenia.php'">Dodawanie zgłoszeń</div>
        <div onclick="document.location='../menu.php'">Menu główne</div>
    </div>
</body>

</html>