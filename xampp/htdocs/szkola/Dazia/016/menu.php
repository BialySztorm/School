<html>

<head>
    <link rel="stylesheet" href="style/main.css">
    <title>Przegląd zespołów medycznych</title>
    <meta charset="UTF-8">
</head>

<body>
    <div>Przegląd zespołów medycznych</div>
    <div class="center">
        <?php
        $connection = mysqli_connect('localhost', 'root');
        mysqli_select_db($connection, 'baza1');
        $dane = mysqli_query($connection, "SELECT zespoly.zespol_logo, zespoly.zespol_ID FROM zespoly");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo "<div class='img' onclick='showImg(\"" . $curr_line['zespol_logo'] . "\")' style=\"background-image: url('" . $curr_line['zespol_logo'] . "')\"></div>";
        }
        mysqli_close($connection);
        ?>
        <div>Naciśnij na obraz żeby go powiększyć</div>
    </div>
    <div class="footer">
        <div onclick="document.location='strony/dyspozytorzy.php'">Wyświetlanie zgłoszeń dyspozytorów</div>
        <div onclick="document.location='strony/zgloszenia.php'">Dodawanie zgłoszeń</div>
        <div onclick="document.location='menu.php'">Menu główne</div>
    </div>

    <div id="show">

        <img id="frame">
        </img>
        <div class="close" onclick="closeImg()"></div>
    </div>
    <!-- <input type='submit' style='background-image=url("")'> -->
    <script src="skrypty/showImg.js"></script>
</body>

</html>