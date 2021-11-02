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
        $dane = $dane = mysqli_query($connection, "SELECT * FROM dyspozytorzy");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo "<div>";
            echo  $curr_line['dyspozytor_imie'] . " " . $curr_line['dyspozytor_nazwisko'] . " st. " . $curr_line['dyspozytor_stanowisko'];
            echo "<input class='change' type='checkbox' name='" . $curr_line['dyspozytor_id'] . "' onchange='change()'>";
            echo "</div>";
        }
        mysqli_close($connection);
        ?>
        <form action="dyspozytorzy_1.php" method='POST'>
            <input style="display: none;" type="text" id="exit" name="dyspozytorzy">
            <input type="submit" value="Sprawdź">
        </form>
    </center>
    <div class="footer">
        <div onclick="document.location='dyspozytorzy.php'">Wyświetlanie zgłoszeń dyspozytorów</div>
        <div onclick="document.location='zgloszenia.php'">Dodawanie zgłoszeń</div>
        <div onclick="document.location='../menu.php'">Menu główne</div>
    </div>
    <script>
        function change() {
            var tmp = "";
            var Refs = document.getElementsByClassName('change');
            for (var i = 0, j = 0; i < Refs.length; i++) {
                if (Refs[i].checked) {
                    if (j > 0)
                        tmp += " OR ";
                    tmp += "zgloszenia.zgloszenie_dyspozytor Like " + Refs[i].name;
                    j++;
                }
            }
            document.getElementById('exit').value = tmp;
        }
    </script>
</body>

</html>