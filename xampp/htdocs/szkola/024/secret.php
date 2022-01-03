<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="AM.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Secret page</title>
</head>

<body>
    <div>
        <?php
        $connection = mysqli_connect("localhost", "root");
        mysqli_select_db($connection, "baza");
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $good = false;
            $result = mysqli_query($connection, "SELECT * FROM users WHERE users.email like '$email'");
            while ($curr = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $curr['password'])) {
                    // $_SESSION['logged_in'] = true;
                    $token = "";
                    do {
                        $token = "";
                        for ($i = 0; $i < 16; $i++) {
                            $randomInt = rand(55, 116);
                            if ($randomInt < 65) $randomInt -= 7;
                            else if ($randomInt > 90) $randomInt += 6;
                            $token .= chr($randomInt);
                        }
                    } while (mysqli_fetch_assoc(mysqli_query($connection, "SELECT count(tokens.token) AS isToken FROM tokens WHERE  tokens.token = '$token'"))['isToken'] != 0);
                    setcookie("username", $token, time() + 300);
                    mysqli_query($connection, "INSERT INTO `tokens` (`token`, `username`) VALUES ('$token', '$email');");
                    $good = true;
                }
            }
            if (!$good)
                header("Location: ./");
        } else if (!isset($_COOKIE['username']) || mysqli_fetch_assoc(mysqli_query($connection, "SELECT count(tokens.token) AS isToken FROM tokens WHERE  tokens.token = '" . $_COOKIE['username'] . "'"))['isToken'] ==  0) {
            header("Location: ./");
        } else {
            setcookie("username", $_COOKIE['username'], time() + 300);
        }
        mysqli_close($connection);
        ?>
        <div>Top Secret</div>
        <div><a href="http://safetyfirst.zs6sobieski.pl" target="_blank">Best site no. 1</a></div>
        <div><a href="https://poznajmymiasto.pl" target="_blank">Best site no. 2</a></div>
        <button onclick="window.location.href = 'end.php'">Logout</button>
        <button onclick="window.location.href = 'register.php'">Register</button>
    </div>
    <div>
        <div>
            <?php
            $connection = mysqli_connect("localhost", "root");
            mysqli_select_db($connection, "baza");
            if (isset($_COOKIE['username']))
                echo "Hello: " . mysqli_fetch_assoc(mysqli_query($connection, "SELECT tokens.username FROM tokens WHERE tokens.token = '" . $_COOKIE['username'] . "'"))['username'];
            else
                echo "Hello: " . $_POST['email'];
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