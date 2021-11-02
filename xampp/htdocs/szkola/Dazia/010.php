<html>

<head>
    <link rel="stylesheet" href="style_baza3.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $wiek = $_POST['wiek'];
    $wzrost = $_POST['wzrost'];
    $bts = $_POST['bts'];
    $pbsp = $_POST['pbsp'];
    $pbfs = $_POST['pbfs'];
    $woj = $_POST['wojewodztwo'];
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'baza2');
    mysqli_query($con, 'INSERT INTO user (`Imie`, `Nazwisko`, `Wiek`, `Wzrost`, `BestTotalScore`, `PersonalBestSP`, `PersonalBestFS`, `Wojewodztwo`) VALUES ("'.$imie.'", "'.$nazwisko.'", "'.$wiek.'", "'.$wzrost.'", "'.$bts.'", "'.$pbsp.'", "'.$pbfs.'", "' . $woj . '")');

    $con->close();

    echo "<div><table>";
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'baza2');
    $zap = mysqli_query($con, 'SELECT user.Imie, user.Nazwisko, user.Wiek, user.Wzrost, user.BestTotalScore, user.PersonalBestSP, user.PersonalBestFS, wojewodztwa.Nazwa_wojewodztwa FROM user INNER JOIN wojewodztwa on user.Wojewodztwo = wojewodztwa.ID_woj');
    echo "<tr><td>Imię:</td><td>Nazwisko:</td><td>Wiek:</td><td>Wzrost:</td><td>Best Total Score:</td><td>Personal Best SP:</td><td>Personal Best FS:</td><td>Województwo:</td></tr>";
    while ($wiersz = mysqli_fetch_assoc($zap)) {
        echo "<tr><td>" . $wiersz['Imie'] . "</td><td>" . $wiersz['Nazwisko'] . "</td><td>" . $wiersz["Wiek"] . "</td><td>" . $wiersz['Wzrost'] . "</td><td>" . $wiersz['BestTotalScore'] . "</td><td>" . $wiersz['PersonalBestSP'] . "</td><td>" . $wiersz['PersonalBestFS'] . "</td><td>" . $wiersz['Nazwa_wojewodztwa'] . "</td></tr>";
    }
    echo "</table></div>";
    $con->close();
    ?>
</body>

</html>