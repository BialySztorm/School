<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="AM.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Logging out</title>
</head>
<?php
// $_SESSION['logged_in'] = false;
$connection = mysqli_connect("localhost", "root");
mysqli_select_db($connection, "baza");
mysqli_query($connection, "DELETE FROM `tokens` WHERE `tokens`.`token` = '".$_COOKIE['username']."'");
mysqli_close($connection);
setcookie("username",$_COOKIE['username'],time()-300);
header("Location: ./");
?>
</html>