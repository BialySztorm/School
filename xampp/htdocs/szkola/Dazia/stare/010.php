<html>

<head>
    <link rel="stylesheet" href="010.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    $im = $_POST['imie'];
    $naz = $_POST['nazwisko'];
    $ul = $_POST['ulica'];
    $nr_d = $_POST['nr_domu'];
    $nr_m = $_POST['nr_mieszkania'];
    $miasto1 = $_POST['miasto_zamieszkania'];
    $data = $_POST['data_urodzenia'];
    $miasto2 = $_POST['miasto_urodzenia'];
    $woj = $_POST['wojewodztwo_urodzenia'];
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'baza2');
    mysqli_query($con, 'INSERT INTO dane_osobowe (`Imie`, `Nazwisko`, `Ulica`, `Numer_domu`, `Numer_mieszkania`, `Miasto_zamieszkania`, `Data_urodzenia`, `Miasto_urodzenia`, `Wojewodztwo_urodzenia`) VALUES ("' . $im . '", "' . $naz . '", "' . $ul . '", "' . $nr_d . '", "' . $nr_m . '", "' . $miasto1 . '", "' . $data . '", "' . $miasto2 . '", "' . $woj . '")');

    $con->close();

    echo "<div><table>";
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'baza2');
    $zap = mysqli_query($con, 'SELECT dane_osobowe.Imie, dane_osobowe.Nazwisko, dane_osobowe.Ulica, dane_osobowe.Numer_domu, dane_osobowe.Numer_mieszkania, dane_osobowe.Miasto_zamieszkania, dane_osobowe.Data_urodzenia, dane_osobowe.Miasto_urodzenia, wojewodztwa.Nazwa_wojewodztwa FROM dane_osobowe INNER JOIN wojewodztwa on dane_osobowe.Wojewodztwo_urodzenia = wojewodztwa.ID_woj');
    echo "<tr><td>Imię:</td><td>Nazwisko:</td><td>Ulica:</td><td>Nr Domu:</td><td>Nr Mieszkania:</td><td>Miasto Zamieszkania:</td><td>Data Urodzenia:</td><td>Miasto Urodzenia:</td><td>Województwo Urodzenia:</td></tr>";
    $i = 0;
    while ($wiersz = mysqli_fetch_assoc($zap)) {
        echo "<tr";
        if (!($i % 2)) {
            echo ' class="parzyste"';
        };
        echo "><td>" . $wiersz['Imie'] . "</td><td>" . $wiersz['Nazwisko'] . "</td><td>" . $wiersz["Ulica"] . "</td><td>" . $wiersz['Numer_domu'] . "</td><td>" . $wiersz['Numer_mieszkania'] . "</td><td>" . $wiersz['Miasto_zamieszkania'] . "</td><td>" . $wiersz['Data_urodzenia'] . "</td><td>" . $wiersz['Miasto_urodzenia'] . "</td><td>" . $wiersz['Nazwa_wojewodztwa'] . "</td></tr>";
        $i++;
    }
    echo "</table></div>";
    $con->close();
    ?>
</body>

</html>