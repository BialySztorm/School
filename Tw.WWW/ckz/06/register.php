<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header("Location: ./");
    }
    if (isset($_POST['email']) && isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $connection = mysqli_connect("localhost", "root");
        mysqli_select_db($connection, "baza");
        $result = mysqli_query($connection, "SELECT COUNT(users.email) as 'wynik' FROM users WHERE users.email like '$email'");
        if (mysqli_fetch_assoc($result)['wynik'] > 0) {
            echo "<script>alert('already in db')</script>";
        } else {
            mysqli_query($connection, "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, '$email', '$hash')");
        }
        mysqli_close($connection);
    }
    ?>
    <form action="register.php" method="post">
        <input type="email" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <input type="submit" value="Zarejestruj">
    </form>
    <button onclick="window.location.href = 'end.php'">Logout</button>
    <button onclick="window.location.href = 'secret.php'">Secret</button>
</body>

</html>