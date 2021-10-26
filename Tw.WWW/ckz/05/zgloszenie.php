<html>
<?php
if(isset($_POST['nr_zespolu']) && isset($_POST['nr_dyspozytora']) && isset($_POST['adres'])){
    $zespol = $_POST['nr_zespolu'];
    $dyspozytor = $_POST['nr_dyspozytora'];
    $adres = $_POST['adres'];
    $pilne = 0;
    $time = date("h:i:sa");
    // echo $time;
    $connection = mysqli_connect("localhost", "root");
    mysqli_select_db($connection,"ratownictwo");
    mysqli_query($connection, "INSERT INTO `zgloszenia` (`ratownicy_id`, `dyspozytorzy_id`, `adres`, `pilne`, `czas_zgloszenia`) VALUES ('$zespol', '$dyspozytor', '$adres', '$pilne', '$time')");
    mysqli_close($connection);
    header("Location: pogotowie.html");
}
?>
</html>