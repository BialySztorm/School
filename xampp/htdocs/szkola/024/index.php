<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="AM.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>
</head>

<body>
    <div>
        <?php
        $connection = mysqli_connect("localhost", "root");
        mysqli_select_db($connection, "baza");
        if (isset($_COOKIE['username']) && mysqli_fetch_assoc(mysqli_query($connection, "SELECT count(tokens.token) AS isToken FROM tokens WHERE  tokens.token = '" . $_COOKIE['username'] . "'"))['isToken'] != 0) {
            header("Location: secret.php");
        } else if (isset($_COOKIE['username'])){
            setcookie("username", $_COOKIE['username'], time() - 300);
        }
        mysqli_close($connection);
        ?>
        <form action="secret.php" method="post">
            <input type="email" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <input class="button" type="submit" value="Login">
        </form>
    </div>
</body>

</html>