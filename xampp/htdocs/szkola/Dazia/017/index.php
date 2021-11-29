<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <div id="baner">
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </div>

    <div id="glowny">

        <div id="lewy">
            <h3>Ceny wybranych artykułów hurtowni:</h3>
            <table>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'sklep');
                $zapytanie = "SELECT nazwa, cena FROM towary where id='1' OR id='2' OR id='3' or id='4'";
                $wynik = mysqli_query($connect, $zapytanie);

                while ($linia = mysqli_fetch_row($wynik)) {
                    echo "<tr>";
                    echo '<td>' . $linia[0] . '</td>';
                    echo '<td>' . $linia[1] . ' zł' . '</td>';
                    echo '</tr>';
                }
                mysqli_close($connect);
                ?>
            </table>
        </div>

        <div id="main">
            <h3>Ile będą kosztować twoje zakupy?</h3>
            <form action="" method="POST">
                Wybierz artykuł: <select name="artykul">
                    <option>Zeszyt 60 kartek</option>
                    <option>Zeszyt 32 kartki</option>
                    <option>Cyrkiel</option>
                    <option>Linijka 30cm</option>
                    <option>Ekierka</option>
                    <option>Linijka 50cm</option>
                </select> <br>
                liczba sztuk:<input type="number" name="liczbasztuk"> <br>
                <input type="submit" value="OBLICZ">
            </form>
            <?php
            if (isset($_POST['artykul']) && isset($_POST['liczbasztuk'])) {
                $wybor = $_POST['artykul'];
                $sztuki = $_POST['liczbasztuk'];

                $connect = mysqli_connect('localhost', 'root', '', 'sklep');

                $wynik2 = mysqli_query($connect, "SELECT towary.cena FROM towary where towary.nazwa LIKE '$wybor'");

                while ($cena = mysqli_fetch_assoc($wynik2))
                    echo round($cena['cena'] * $sztuki, 1);

                mysqli_close($connect);
            }

            ?>
        </div>

        <div id="prawy">
            <img src="zakupy2.png">
            <h3>Kontakt</h3>
            <p> telefon:<br> 111222333 <br> e-mail: <br> <a href="mailto:hurt@wp.pl">hurt@wp.pl</a> </p>
        </div>

    </div>

    <footer>
        <h4>Witrynę wykonała: Daria Durkowska 4in</h4>
    </footer>
</body>

</html>