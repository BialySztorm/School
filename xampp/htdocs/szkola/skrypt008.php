<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style008.css">
    <link rel="icon" href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/c02482cf-026d-4039-996e-dbd1da37794c/d8u1sq2-86243a29-c187-4398-a367-db35a14991f7.png/v1/fill/w_184,h_184,q_80,strp/steam_bloody_unicorn_by_xfinaal_d8u1sq2-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD0xODQiLCJwYXRoIjoiXC9mXC9jMDI0ODJjZi0wMjZkLTQwMzktOTk2ZS1kYmQxZGEzNzc5NGNcL2Q4dTFzcTItODYyNDNhMjktYzE4Ny00Mzk4LWEzNjctZGIzNWExNDk5MWY3LnBuZyIsIndpZHRoIjoiPD0xODQifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.WEs_SuW1VaeVtRAsNMEjrnj3mahk6TGAkXkGjy53rFs" type="image/x-icon" />
    <link rel="shortcut icon" href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/c02482cf-026d-4039-996e-dbd1da37794c/d8u1sq2-86243a29-c187-4398-a367-db35a14991f7.png/v1/fill/w_184,h_184,q_80,strp/steam_bloody_unicorn_by_xfinaal_d8u1sq2-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3siaGVpZ2h0IjoiPD0xODQiLCJwYXRoIjoiXC9mXC9jMDI0ODJjZi0wMjZkLTQwMzktOTk2ZS1kYmQxZGEzNzc5NGNcL2Q4dTFzcTItODYyNDNhMjktYzE4Ny00Mzk4LWEzNjctZGIzNWExNDk5MWY3LnBuZyIsIndpZHRoIjoiPD0xODQifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.WEs_SuW1VaeVtRAsNMEjrnj3mahk6TGAkXkGjy53rFs" type="image/x-icon" />

</head>

<body>
    <div class="tlo"></div>
    <div class="calosc">
        <form method="POST" action="">
            <?php
            $plik = $_POST['pytania'];;
            $plikO = fopen($plik, "r");
            $plik1 = $_POST['odpowiedzi'];
            $plikO2 = fopen($plik1, "r");
            $start = 0;
            $i = 0;
            $j = 0;
            $pytania = 0;
            while (!feof($plikO)) {
                $linia = fgets($plikO);
                if ($start == 0)
                    $start++;
                else if ($start == 1) {
                    $pytania = $linia[0] + 1;
                    $start++;
                } else if ($start == 2) {
                    echo '<div class="tytul">' . $linia . '</div>';
                    $start++;
                } else if ($start == 3) {
                    if (!($i % $pytania)) {
                        if (!($i == 0))
                            echo "</tr></table></fieldset></div>";
                        echo '<div class="pytania">';
                        echo '<div class="pytanie">' . $linia . '</div>';
                        $j++;
                        echo '<fieldset id="pytanie' . $j . '">';
                        echo '<table cellspacing="10"><tr>';
                    } else {
                        if (isset($_POST["pytanie" . $j])) {
                            if ($linia[0] == $_POST["pytanie" . $j]) {
                                $linia2 = fgets($plikO2);
                                // echo $linia2;
                                if ($_POST["pytanie" . $j] == $linia2[0])
                                    echo '<td class="odpowiedz green"><input class="radio" type="radio" value="' . $linia[0] . '" name="pytanie' . $j . '"checked >' . substr($linia, 4) . "</td>";
                                else
                                    echo '<td class="odpowiedz red"><input class="radio" type="radio" value="' . $linia[0] . '" name="pytanie' . $j . '"checked >' . substr($linia, 4) . "</td>";
                            } else
                                echo '<td class="odpowiedz"><input class="radio" type="radio" value="' . $linia[0] . '" name="pytanie' . $j . '" >' . substr($linia, 4) . "</td>";
                        } else
                            echo '<td class="odpowiedz"><input class="radio" type="radio" value="' . $linia[0] . '" name="pytanie' . $j . '" >' . substr($linia, 4) . "</td>";
                    }
                    $i++;
                }
            }
            fclose($plikO2);
            fclose($plikO);
            ?>
            </tr>
            </table>
            </fieldset>
    </div>
    <div class="pytania">Podaj Imię i Nazwisko Jeśli chcesz aby twoje odpowiedzi zostały zapisane<input class="in" type="text" name="in"></div>
    <input type="text" name="pytania" value="<?php echo $_POST['pytania']; ?>" class="invisible">
    <input type="text" name="odpowiedzi" value="<?php echo $_POST['odpowiedzi']; ?>" class="invisible">
    <input type="text" name="punkty" value="<?php echo $_POST['punkty']; ?>" class="invisible">
    <input class="enter" type="submit" value="Sprawdź">
    </form>
    <?php
    $plik = $_POST['odpowiedzi'];
    $plikO = fopen($plik, "r");
    $max = count(file($_POST['odpowiedzi']));
    $steady = 0;
    for ($i = 1; $i <= $max; $i++) {
        if (!isset($_POST['pytanie' . $i]))
            $steady++;
    }
    if (!$steady) {
        // echo $max;
        $wynik = 0;
        for ($i = 1; $i <= $max; $i++) {
            $linia = fgets($plikO);
            $nazwa = "pytanie" . $i;
            // echo $_POST[$nazwa]."<br>";
            if ($linia[0] == $_POST[$nazwa])
                $wynik++;
        }
        $procent = $wynik / $max * 100;
        $ocena;
        if ($procent == 100)
            $ocena = 5;
        else if ($procent >= 80)
            $ocena = 4;
        else if ($procent >= 65)
            $ocena = 3;
        else if ($procent >= 50)
            $ocena = 2;
        else
            $ocena = 1;
        $in = "";
        if (isset($_POST['in']) && $_POST['in'] != "") {
            $in = $_POST['in'];
            $plik2 = $_POST['punkty'];
            $plikO2 = fopen($plik2, "a");
            fwrite($plikO2, "\n" . $in . "; " . $wynik . " / " . $max . " pkt; ocena: " . $ocena);
        }
        echo '<script>alert("' . $in . '\nZdobyłeś ' . $wynik . " / " . $max . ' punktów\nCo daje ' . $procent . '%\nOraz uzyskałeś ocenę: ' . $ocena . '")</script>';
        fclose($plikO);
    } else if ($steady != $max) {
        echo '<script>alert("Udziel odpowiedzi na wszystkie pytania!")</script>';
    }
    ?>
    </div>
</body>

</html>