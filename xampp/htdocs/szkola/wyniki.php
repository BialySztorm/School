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
        <div class="tytul">Wyniki:</div>
        <?php
        $plik = $_POST['punkty'];
        $plikO = fopen($plik, "r");
        while (!feof($plikO)) {
            $linia = fgets($plikO);
            // if($linia!="\n"){
            echo '<div class="pytania">';
            $linia1 = explode(";", $linia);
            for ($i = 0; $i < count($linia1); $i++) {
                echo '<div class="pytanie">' . $linia1[$i] . '</div>';
            }
            echo "</div>";
            // }
        }
        fclose($plikO);
        ?>
    </div>
</body>

</html>