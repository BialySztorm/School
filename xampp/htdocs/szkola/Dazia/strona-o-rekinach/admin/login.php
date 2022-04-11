
<?php
require "database.php";

if (isset($_POST['submit_btn'])) {

    $login = $_POST['login'];
    $passwd = $_POST['password'];

    $con = mysqli_connect($hostname, $username, $password, $database);
    $query = mysqli_query($con, "SELECT `id`, `password` FROM `users` WHERE `username` = '$login' and `admin` = 1 ;");
    while ($row = mysqli_fetch_assoc($query)) {
        $hash = $row['password'];
        if (password_verify($passwd, $hash)) {
            // echo '<script>alert("logged")</script>';
            session_start();
            $_SESSION['isLogged1'] = $row['id'];
            header('Location: courses.php');
        } else {
            header('Location: login_page.php');
        }
    }
    header('Location: login_page.php');
}

?>