<html>

<head>
    <link rel="stylesheet" href="../style/submain.css">
    <title>Przegląd zespołów medycznych</title>
    <link rel="shortcut icon" href="../grafika/AM.ico" />
    <meta charset="UTF-8">
</head>

<body>
    <h1>Raport wyjazdu jednostki</h1>
    <center>
        <table>
            <?php
            if (isset($_POST['opis']) && isset($_POST['data']) && isset($_POST['zespol']) && isset($_POST['dyspozytor'])) {
                $connection = mysqli_connect('localhost', 'root');
                mysqli_select_db($connection, 'baza1');
                $opis = $_POST['opis'];
                $data = $_POST['data'];
                $zespol = $_POST['zespol'];
                $dyspozytor = $_POST['dyspozytor'];
                mysqli_query($connection, "INSERT INTO zgloszenia (`zgloszenie_opis`,`zgloszenie_data`,`zgloszenie_zespol`,`zgloszenie_dyspozytor`) VALUES ('$opis','$data','$zespol','$dyspozytor')");
                echo "<tr><th>Dnia</th><th>Dyspozytor</th><th>Wybrany zespół</th><th>Opis sytuacji</th></tr>";
                $dane = mysqli_query($connection, "SELECT zespoly.zespol_nazwa FROM zespoly WHERE zespoly.zespol_ID = $zespol");
                $dane = mysqli_fetch_assoc($dane);
                $zespol1 = $dane['zespol_nazwa'];
                $dane = mysqli_query($connection, "SELECT dyspozytorzy.dyspozytor_imie, dyspozytorzy.dyspozytor_nazwisko, dyspozytorzy.dyspozytor_stanowisko FROM dyspozytorzy WHERE dyspozytorzy.dyspozytor_id = $dyspozytor");
                $dane = mysqli_fetch_assoc($dane);
                $dyspozytor1 = $dane['dyspozytor_imie'] . " " . $dane['dyspozytor_nazwisko'] . " st. " . $dane['dyspozytor_stanowisko'];
                echo "<tr><td>$data</td><td>$dyspozytor1</td><td>$zespol1</td><td>$opis</td></tr>";
                mysqli_close($connection);
            }
            ?>
        </table>
        <button onclick="document.location='zgloszenia.php'">Prześlij kolejne zlecenie</button>
    </center>
    <div class="footer">
        <div onclick="document.location='dyspozytorzy.php'">Wyświetlanie zgłoszeń dyspozytorów</div>
        <div onclick="document.location='zgloszenia.php'">Dodawanie zgłoszeń</div>
        <div onclick="document.location='../menu.php'">Menu główne</div>
    </div>
</body>

</html>