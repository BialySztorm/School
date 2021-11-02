<?php
echo "<link rel=\"stylesheet\" href=\"style_baza2.css\" />";

$host = "localhost";
$db_user = "root";
$db_password = '';
$db_name = "baza2";
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$klasa = $_POST['klasa'];
$wiek = $_POST['wiek'];
$hobby = $_POST['hobby'];

$con = mysqli_connect($host,$db_user);
mysqli_select_db ($con,$db_name);
$zap=mysqli_query($con, 'INSERT INTO user (`Imie`, `Nazwisko`, `Klasa`, `Wiek`, `Hobby`) VALUES ("'.$imie.'", "'.$nazwisko.'", "'.$klasa.'", "'.$wiek.'", "'.$hobby.'")');
$con->close();

$con = mysqli_connect($host,$db_user);
mysqli_select_db ($con,$db_name);
$zap=mysqli_query($con, 'select Imie, Nazwisko, Klasa, Wiek, Hobby from user');
echo "<div><table><tr><td>Imię:</td><td>Nazwisko:</td><td>Klasa:</td><td>Wiek:</td><td>Hobby:</td></tr>";
while($wiersz=mysqli_fetch_assoc($zap)) {
    echo "<tr><td>".$wiersz['Imie']."</td><td>".$wiersz['Nazwisko']."</td><td>".$wiersz["Klasa"]."</td><td>".$wiersz['Wiek']."</td><td>".$wiersz['Hobby']."</td></tr>";
}
echo "</table></div>";
$con->close();
?>