<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="AM.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Register page</title>
</head>

<body>
    <div>
        <?php
        $connection = mysqli_connect("localhost", "root");
        mysqli_select_db($connection, "baza");
        if (!isset($_COOKIE['username']) || mysqli_fetch_assoc(mysqli_query($connection, "SELECT count(tokens.token) AS isToken FROM tokens WHERE  tokens.token = '" . $_COOKIE['username'] . "'"))['isToken'] == 0) {
            header("Location: ./");
        }
        setcookie("username", $_COOKIE['username'], time() + 300);
        if (isset($_POST['email']) && isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $result = mysqli_query($connection, "SELECT COUNT(users.email) as 'wynik' FROM users WHERE users.email like '$email'");
            if (mysqli_fetch_assoc($result)['wynik'] > 0) {
                echo "<script>alert('already in db')</script>";
            } else {
                mysqli_query($connection, "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, '$email', '$hash')");
            }
            mysqli_close($connection);
        }
        mysqli_close($connection);
        ?>
        <form action="register.php" method="post">
            <input type="email" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <input class="button" type="submit" value="Register">
        </form>
        <button onclick="window.location.href = 'end.php'">Logout</button>
        <button onclick="window.location.href = 'secret.php'">Secret</button>
    </div>
    <div>
        <div>
            <?php
            $connection = mysqli_connect("localhost", "root");
            mysqli_select_db($connection, "baza");
            echo "Hello: " . mysqli_fetch_assoc(mysqli_query($connection, "SELECT tokens.username FROM tokens WHERE tokens.token = '" . $_COOKIE['username'] . "'"))['username'];
            ?>
        </div>
        <div>
            <div>Time left:</div>
            <div class="timer"></div>
            <div class="timer"></div>
            <div class="timer"></div>
        </div>
    </div>
    <script src="timer.js"></script>
</body>

</html>