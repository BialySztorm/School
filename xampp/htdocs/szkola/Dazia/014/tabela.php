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
        echo '<th>ID samochodu</th><th>Marka</th><th>Model</th>';
        echo '</tr>';
        $dane = mysqli_query($con, "SELECT samochody.id, marki.marka, samochody.model FROM samochody INNER JOIN marki ON samochody.marka = marki.id_marki");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo '<tr>';
            echo '<td>' . $curr_line['id'] . '</td><td>' . $curr_line['marka'] . '</td><td>' . $curr_line['model'] ;
            echo '</tr>';
        }
        mysqli_close($con);

        ?>
    </table>
    <script src="data.js"></script>
</body>

</html>