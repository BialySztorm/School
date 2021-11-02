<html>

<head>
    <link rel="stylesheet" href="style/main.css">
    <title>Przegląd zespołów medycznych</title>
    <link rel="shortcut icon" href="grafika/AM.ico" />
    <meta charset="UTF-8">
</head>

<body>
    <div>Przegląd zespołów medycznych</div>
    <div class="center">
    <?php
    require_once('strony/connection.php');
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    $dane = @$connection->query("SELECT zespoly.zespol_logo, zespoly.zespol_ID FROM zespoly");
    while ($curr_line = $dane->fetch_assoc()) {
        echo "<form action='strony/zespol.php' method='POST'>";
        echo "<input style='display:none;' type='text' name='zespol' value='". $curr_line['zespol_ID']."'>";
        echo "<div class='img' onclick='showImg(this)'>". $curr_line['zespol_logo'] ."</div>";
        echo "<input type='submit' style=\"background-image: url('" . $curr_line['zespol_logo'] . "')\" value=''>";
        
        echo "</form>";
    }
    
    ?>
    <div class="show">Naciśnij na obraz żeby ukazać go w oryginalnej wielkości lub na nazwę zespołu żeby wybrać związane z nim akcje</div>
    </div>
    <div class="footer">
        <div onclick="document.location='strony/ratownicy.php'">Edycja ratowników</div>
        <div onclick="document.location='strony/dyspozytorzy.php'">Edycja dyspozytorów</div>
        <div onclick="document.location='strony/zgloszenia.php'">Dodawanie zgłoszeń</div>
        <div onclick="document.location='menu.php'">Menu główne</div>
    </div>

    <div id="show">
        <div class="close" onclick="closeImg()"></div>
        <img id="frame">
        </img>
    </div>
    <!-- <input type='submit' style='background-image=url("")'> -->
    <script src="skrypty/showImg.js"></script>
</body>

</html>