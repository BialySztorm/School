<?php
$odp1 = $_POST['pytanie1'];
$odp2 = $_POST['pytanie2'];
$odp3 = $_POST['pytanie3'];
$odp4 = $_POST['pytanie4'];
$odp5 = $_POST['pytanie5'];
$odp6 = $_POST['pytanie6'];
$odp7 = $_POST['pytanie7'];
$odp8 = $_POST['pytanie8'];
$odp9 = $_POST['pytanie9'];
$odp10 = $_POST['pytanie10'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$mail = $_POST['mail'];

$poprawne = 0;

if ($odp1 == "C") {
    $poprawne++;
}
if ($odp2 == "B") {
    $poprawne++;
}
if ($odp3 == "B") {
    $poprawne++;
}
if ($odp4 == "A") {
    $poprawne++;
}
if ($odp5 == "D") {
    $poprawne++;
}
if ($odp6 == "A") {
    $poprawne++;
}
if ($odp7 == "C") {
    $poprawne++;
}
if ($odp8 == "B") {
    $poprawne++;
}
if ($odp9 == "C") {
    $poprawne++;
}
if ($odp10 == "D") {
    $poprawne++;
}
$wynik = $poprawne / 10;
if ($wynik == 1)
    $ocena = 5;
else if ($wynik >= 0.8)
    $ocena = 4;
else if ($wynik >= 0.65)
    $ocena = 3;
else if ($wynik >= 0.5)
    $ocena = 2;
else
    $ocena = 1;

echo "<div id='wynik'> $poprawne / 10 poprawnych </div>";
$nazwa_pliczku = "wyniki.txt";
$pliczek = fopen($nazwa_pliczku, "a");
fwrite($pliczek, "Imię: " . $imie . ";Nazwisko: " . $nazwisko . ";E-mail: " . $mail . ";Wynik: " . $poprawne . " / 10;Procent: " . ($wynik * 100) . "%;Ocena: " . $ocena . "\n");
fclose($pliczek);
$pliczek = fopen($nazwa_pliczku, "r");
echo "<table>";
while (!feof($pliczek)) {
    echo "<tr>";
    $linia = fgets($pliczek);
    $linia1 = explode(";", $linia);
    for ($i = 0; $i < count($linia1); $i++) {
        echo '<td>' . $linia1[$i] . '</td>';
    }
    echo "</tr>";
}
echo "</table>";
fclose($pliczek);
?>