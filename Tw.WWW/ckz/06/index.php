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
        session_start();
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            header("Location: secret.php");
        }
        ?>
        <form action="secret.php" method="post">
            <input type="email" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <input class="button" type="submit" value="Login">
        </form>
    </div>
</body>

</html>