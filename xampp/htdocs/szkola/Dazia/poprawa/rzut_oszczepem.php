<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="sportowcy_style.css">
    <meta charset="UTF-8">
</head>

<body>
    <div class="naglowek">
        <h3>Klub sportowy: rzut oszczepem </h3>
    </div>

    <?php

    $connect = mysqli_connect('localhost', 'root');
    mysqli_select_db($connect, 'baza');
    $req1 = mysqli_query($connect, "SELECT count(*) FROM sportowiec");
    // $req2 = mysqli_query($connect, "SELECT sportowiec.imie, sportowiec.nazwisko FROM sportowiec WHERE sportowiec.id = 1");
    // $req3 = mysqli_query($connect, "SELECT avg(wyniki.wynik) FROM wyniki WHERE wyniki.sportowiec_id = 1 AND wyniki.dyscyplina_id = 3");
    $req4 = mysqli_query($connect, "SELECT max(wyniki.wynik) FROM wyniki WHERE wyniki.dyscyplina_id = 3");

    while ($rekord = mysqli_fetch_array($req4)) {
        $rek = $rekord[0];
        echo "<div class='rekord'>Nasz rekord: " . $rek . " s</div>";
    }

    while ($wiersz = mysqli_fetch_assoc($req1)) {
        $osoby = $wiersz['count(*)'];
    }
    echo "<table cellspacing='30'>";
    $add = 0;

    for ($i = 1; $i <= $osoby; $i++) {

        $zap = mysqli_query($connect, 'SELECT sportowiec.imie, sportowiec.nazwisko, avg(wyniki.wynik) FROM wyniki INNER JOIN sportowiec ON wyniki.sportowiec_id = sportowiec.id WHERE wyniki.sportowiec_id = ' . $i . ' AND wyniki.dyscyplina_id = 3;');

        while ($wiersz = mysqli_fetch_array($zap)) {
            $imie = $wiersz[0];
            $nazwisko = $wiersz[1];
            $swynik = $wiersz[2];
        }
        if (!($add % 2)) {
            echo "<tr><td><h3>" . $imie . " " . $nazwisko . "</h3><p>średni wynik: $swynik</p></td>";
        } else {
            echo "<td><h3>" . $imie . " " . $nazwisko . "</h3><p>średni wynik: $swynik</p></td></tr>";
        }
        $add++;
    }
    echo "</table>";
    ?>
    <div class="stopka">
        <div class="pointer" onclick="document.location='sportowcy_witryna_internetowa.html'">Kluby sportowe</div>
        <div>Stronę opracowała Daria Durkowska 3in</div>
    </div>
</body>

</html>