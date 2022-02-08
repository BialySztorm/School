<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>

<body>
    <div id="baner">
        <h3>Portal społecznościowy - panel administratora</h3>
    </div>
    <div id="main">

        <div id="lewy">
            <h4>Użytkownicy</h4>

            <?php
            $con = mysqli_connect('localhost', 'root', '', 'dane');

            $zapytanie1 = mysqli_query($con, "SELECT id, imie, nazwisko, opis, rok_urodzenia, zdjecie FROM `osoby` LIMIT 30;");



            while ($dane = mysqli_fetch_array($zapytanie1)) {
                $wiek = $dane['rok_urodzenia'];
                $now = date('Y');
                $lata = $now - $wiek;
                echo "<p>" . $dane['id'] . ". " . $dane["imie"] . " " . $dane["nazwisko"] . " " . $lata . " lat.</p>";
            }
            ?>


            <a href="settings.html">Inne ustawienia</a>

        </div>

        <div id="prawy">

            <h4>Podaj id użytkownika</h4>

            <form action="users.php" method="POST">
                <input type="number" name="id">
                <input type="submit" value="ZOABCZ">
            </form>
            <hr>

            <?php
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $zapytanie2 = mysqli_query($con, "SELECT osoby.imie, osoby.nazwisko, osoby.opis, osoby.rok_urodzenia, osoby.zdjecie, hobby.nazwa FROM `osoby` INNER JOIN hobby ON osoby.Hobby_id=hobby.id WHERE osoby.id='$id'");
                $dane = mysqli_fetch_assoc($zapytanie2);
                echo "<p>" . $dane['imie'] . " " . $dane["nazwisko"] . "<br>" . $dane["opis"] . "<br>" . $dane["rok_urodzenia"] . "<br><img src='" . $dane["zdjecie"] . "'><br>" . $dane["nazwa"] . "</p>";
            }
            mysqli_close($con)
            ?>

        </div>
    </div>

    <footer>
        <p>Stronę wykonał: 11111111111</p>
    </footer>

</body>

</html>