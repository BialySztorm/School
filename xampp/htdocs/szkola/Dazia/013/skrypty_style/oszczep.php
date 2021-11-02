<html>

<head>
    <link rel="stylesheet" href="013.css">
    <meta charset="UTF-8">
</head>

<body>
    <div class="baner">
        Klub sportowy: rzut oszczepem
    </div>
    <?php
    try {
        $dyscyplina = 3;
        $con = mysqli_connect('localhost', 'root');
        mysqli_select_db($con, 'baza2');
        $dane = mysqli_query($con, "SELECT MAX(wyniki.sportowiec_id) FROM wyniki WHERE wyniki.dyscyplina_id = $dyscyplina");
        $curr_line = mysqli_fetch_assoc($dane);
        $uczestnicy = $curr_line['MAX(wyniki.sportowiec_id)'];
        $wyniki = array_fill(0, $uczestnicy , 0);
        $udzial = array_fill(0, $uczestnicy , 0);
        $uczestnicy_tab = array_fill(0, $uczestnicy + 1, 0);
        $dane = mysqli_query($con, "SELECT wyniki.dyscyplina_id, wyniki.sportowiec_id, wyniki.wynik FROM wyniki WHERE wyniki.dyscyplina_id = $dyscyplina");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            $wyniki[$curr_line['sportowiec_id']-1] = $wyniki[$curr_line['sportowiec_id']-1] + $curr_line['wynik'];
            $udzial[$curr_line['sportowiec_id']-1]++;
        }
        $dane = mysqli_query($con, "SELECT * FROM sportowiec");
        while ($curr_line = mysqli_fetch_assoc($dane)) {
            $uczestnicy_tab[$curr_line['id']] = $curr_line['imie'] . " " . $curr_line['nazwisko'];
        }
        $dane = mysqli_query($con, "SELECT MAX(wyniki.wynik) FROM wyniki WHERE wyniki.dyscyplina_id = $dyscyplina");
        $curr_line = mysqli_fetch_assoc($dane);
        $best = $curr_line['MAX(wyniki.wynik)'];
        if ($uczestnicy)
            echo "<div class='record'>Nasz rekord: " . $best . " m</div>";
        else
            echo "<div class='record'>Nasz rekord: brak</div>";
        echo "<table cellspacing='30'>";
        echo "<tr>";
        for ($i = 0; $i < $uczestnicy; $i++) {
            echo "<td>";
            echo "<div class='uczestnik'>" . $uczestnicy_tab[$i+1] . "</div>";
            echo "<div class='wynik'>średni wynik: " . $wyniki[$i] / $udzial[$i] . "</div>";
            echo "</td>";
            if ($i % 2)
                echo "</tr><tr>";
        }
        echo "</tr>";
        echo "</table>";
    } catch (Error $e) {
        echo "<h1> Error: " . $e . "</h1>";
    }

    ?>
    <div class="stopka">
        <div class="pointer" onclick="document.location='../index.html'">Kluby sportowe</div>
        <div>Stronę opracował: Andrzej Manderla</div>
    </div>
</body>

</html>