<html>

<head>
    <link rel="stylesheet" href="style_trzy_tabele.css">
    <meta charset="UTF-8">
</head>

<body id="form">
    
<input type="button" id="Button2" value="Menu" onclick="document.location='menu.html'">
    <table>
        <?php

        $con = mysqli_connect('localhost', 'root');
        mysqli_select_db($con, 'baza2');
        echo '<tr>';
        echo '<th>Imie</th><th>Nazwisko</th><th>Kraj</th><th>Personal Best</th><th>Trener</th>';
        echo '</tr>';
        $dane = mysqli_query($con, "SELECT * FROM lyzwiarze");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo '<tr>';
            echo '<td>' . $curr_line['Imie'] . '</td><td>' . $curr_line['Nazwisko'] . '</td><td>' . $curr_line['Kraj'] . '</td><td>' . $curr_line['PersonalBest'] . '</td><td>' . $curr_line['Trener'] ;
            echo '</tr>';
        }
        mysqli_close($con);

        ?>
    </table>
    <table>
        <?php

        $con = mysqli_connect('localhost', 'root');
        mysqli_select_db($con, 'baza2');
        echo '<tr>';
        echo '<th>Kategoria</th><th>Imie</th><th>Nazwisko</th><th>Punkty - short program</th><th>Punkty - free skating</th><th>Punkty - suma</th>';
        echo '</tr>';
        $dane = mysqli_query($con, "SELECT zawody.Kategoria, lyzwiarze.Imie, lyzwiarze.Nazwisko, zawody.Punkty_Short, zawody.Punkty_Free, zawody.Punkty_All FROM zawody INNER JOIN lyzwiarze ON zawody.ID_lyzwiarza = lyzwiarze.ID");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo '<tr>';
            echo '<td>' . $curr_line['Kategoria'] . '</td><td>' . $curr_line['Imie'] . '</td><td>' . $curr_line['Nazwisko'] . '</td><td>' . $curr_line['Punkty_Short'] . '</td><td>' . $curr_line['Punkty_Free'] . '</td><td>' . $curr_line['Punkty_All'] ;
            echo '</tr>';
        }
        mysqli_close($con);

        ?>
    </table>
    <script src="data.js"></script>
</body>

</html>