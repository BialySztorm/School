<html>
<head>
    <link rel="stylesheet" href="010.css">
    <meta charset="UTF-8">
</head>
<body>
<?php
require_once('connection.php');
$im = $_POST['imie'];
$naz = $_POST['nazwisko'];
$ul = $_POST['ulica'];
$nr_d = $_POST['nr_domu'];
$nr_m = $_POST['nr_mieszkania'];
$miasto1 = $_POST['miasto_zamieszkania'];
$data = $_POST['data_urodzenia'];
$miasto2 = $_POST['miasto_urodzenia'];
$woj = $_POST['wojewodztwo_urodzenia'];

try {
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    try {
        $connection->query('INSERT INTO dane_osobowe (`Imie`, `Nazwisko`, `Ulica`, `Numer_domu`, `Numer_mieszkania`, `Miasto_zamieszkania`, `Data_urodzenia`, `Miasto_urodzenia`, `Wojewodztwo_urodzenia`) VALUES ("'.$im.'", "'.$naz.'", "'.$ul.'", "'.$nr_d.'", "'.$nr_m.'", "'.$miasto1.'", "'.$data.'", "'.$miasto2.'", "'.$woj.'")');
    } catch(Error $e) {
        echo "<h1> Insertion Error".$e."</h1>";
    }
    
    $connection->close();
} catch(Error $e) {
    echo "<h1> Error".$e."</h1>";
}

try {
    echo "<div><table>";
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    $connection -> query ('SET NAMES utf8');
    $connection -> query ('SET CHARACTER_SET utf8_unicode_ci');

    $dane = @$connection->query("SELECT dane_osobowe.Imie, dane_osobowe.Nazwisko, dane_osobowe.Ulica, dane_osobowe.Numer_domu, dane_osobowe.Numer_mieszkania, dane_osobowe.Miasto_zamieszkania, dane_osobowe.Data_urodzenia, dane_osobowe.Miasto_urodzenia, wojewodztwa.Nazwa_wojewodztwa FROM dane_osobowe INNER JOIN wojewodztwa on dane_osobowe.Wojewodztwo_urodzenia = wojewodztwa.ID_woj");
    echo "<tr><td>Imię:</td><td>Nazwisko:</td><td>Ulica:</td><td>Nr Domu:</td><td>Nr Mieszkania:</td><td>Miasto Zamieszkania:</td><td>Data Urodzenia:</td><td>Miasto Urodzenia:</td><td>Województwo Urodzenia:</td></tr>";
    $i = 0;
    while($curr_line = $dane->fetch_assoc()) {
        echo "<tr";
        if(!($i%2)){
            echo ' class="parzyste"';
        };
        echo "><td>".$curr_line['Imie']."</td><td>".$curr_line['Nazwisko']."</td><td>".$curr_line["Ulica"]."</td><td>".$curr_line['Numer_domu']."</td><td>".$curr_line['Numer_mieszkania']."</td><td>".$curr_line['Miasto_zamieszkania']."</td><td>".$curr_line['Data_urodzenia']."</td><td>".$curr_line['Miasto_urodzenia']."</td><td>".$curr_line['Nazwa_wojewodztwa']."</td></tr>";
        $i++;
    }
    echo "</table></div>";
    $dane->free_result();
    $connection->close();
} catch(Error $e) {
    echo "<h1> Error".$e."</h1>";
}
?>
</body>
</html>