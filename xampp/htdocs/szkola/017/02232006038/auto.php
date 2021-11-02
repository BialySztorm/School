<html>

<head>
    <link rel="stylesheet" href="auto.css">
    <title>Komis Samochodowy</title>
    <meta charset="UTF-8">
</head>

<body>
    <header>
        <h1>SAMOCHODY</h1>
    </header>
    <section class="left">
        <h2>Wykaz samochodów</h2>
        <ul>
            <?php
            $con = mysqli_connect("localhost", "root");
            mysqli_select_db($con, "komis");
            $dane = mysqli_query($con, "SELECT samochody.id, samochody.marka, samochody.model FROM samochody");
            while ($curr_line = mysqli_fetch_array($dane)) {
                echo "<li>" . $curr_line[0] . " " . $curr_line[1] . " " . $curr_line[2] . "</li>";
            }
            ?>
        </ul>
        <h2>Zamówienia</h2>
        <ul>
            <?php
            $con = mysqli_connect("localhost", "root");
            mysqli_select_db($con, "komis");
            $dane = mysqli_query($con, "SELECT zamowienia.Samochody_id, zamowienia.Klient FROM zamowienia");
            while ($curr_line = mysqli_fetch_array($dane)) {
                echo "<li>" . $curr_line[0] . " " . $curr_line[1] . "</li>";
            }
            ?>
        </ul>
    </section>
    <section class="right">
        <h2>Pełne dane: Fiat</h2>
        <?php
        $con = mysqli_connect("localhost", "root");
        mysqli_select_db($con, "komis");
        $dane = mysqli_query($con, "SELECT * FROM samochody WHERE samochody.marka = 'Fiat'");
        while ($curr_line = mysqli_fetch_array($dane)) {
            echo "<p>" . $curr_line[0] . " / " . $curr_line[1] . " / " . $curr_line[2] . " / " . $curr_line[3] . " / " . $curr_line[4] . " / " . $curr_line[5] . "</p>";
        }
        ?>
    </section>
    <footer>
        <table>
            <tr>
                <td><a href="kwerendy.txt" target="_blank">Kwerendy</a></td>
                <td>Autor: 02232006038</td>
                <td><img src="komis/auto.png" alt="komis samochodowy"></td>
            </tr>
        </table>
    </footer>
</body>

</html>