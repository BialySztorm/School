<!DOCTYPE html>
<html>

<?php

$con = mysqli_connect("localhost", "root", "", "dane");

$tytul = $_POST['tytul'];
$gatunek = $_POST['gatunek'];
$rok = $_POST['rok'];
$ocena = $_POST['ocena'];

$zapytanie = mysqli_query($con, "INSERT INTO filmy (tytul, gatunki_id, rok, ocena) VALUES ('$tytul', '$gatunek', '$rok', '$ocena');");

if ($zapytanie) {
    echo "Film " . $tytul . " został dodany do bazy.";
}

mysqli_close($con);

?>


</html>