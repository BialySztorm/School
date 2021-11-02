<html>

<head>
    <link rel="stylesheet" href="012.css">
    <meta charset="UTF-8">
</head>

<body>
    <table>
        <?php

        $con = mysqli_connect('localhost', 'root');
        mysqli_select_db($con, 'baza');
        echo '<tr>';
        echo '<th>Imię</th><th>Nazwisko</th><th>Stanowisko</th><th>Data uprawnień</th>';
        echo '</tr>';
        $dane = mysqli_query($con, "SELECT pracownicy.imie, pracownicy.nazwisko, stanowiska.nazwa_stanowiska FROM pracownicy INNER JOIN stanowiska ON pracownicy.stanowisko = stanowiska.id_stanowiska where pracownicy.stanowisko>1");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo '<tr>';
            echo '<td>' . $curr_line['imie'] . '</td><td>' . $curr_line['nazwisko'] . '</td><td>' . $curr_line['nazwa_stanowiska'] . '</td><td>-----</td>';
            echo '</tr>';
        }
        $dane = mysqli_query($con, "SELECT pracownicy.imie, pracownicy.nazwisko, stanowiska.nazwa_stanowiska, ure.data_uprawnien FROM pracownicy INNER JOIN stanowiska ON pracownicy.stanowisko = stanowiska.id_stanowiska INNER JOIN ure ON pracownicy.id_pracownika = ure.id_pracownika");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            echo '<tr  class="red">';
            echo '<td>' . $curr_line['imie'] . '</td><td>' . $curr_line['nazwisko'] . '</td><td>' . $curr_line['nazwa_stanowiska'] . '</td><td class="data">' . $curr_line['data_uprawnien'] . '</td>';
            echo '</tr>';
        }
        mysqli_close($con);

        ?>
    </table>
    <script src="data.js"></script>
</body>

</html>