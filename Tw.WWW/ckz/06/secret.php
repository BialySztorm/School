<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="AM.png" type="image/x-icon" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Login page</title>
</head>

<body>
    <div>
        <?php
        session_start();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $connection = mysqli_connect("localhost", "root");
            mysqli_select_db($connection, "baza");
            $good = false;
            $result = mysqli_query($connection, "SELECT * FROM users WHERE users.email like '$email'");
            while ($curr = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $curr['password'])){
                    $_SESSION['logged_in'] = true;
                    $good = true;
                }
                    
            }
            if(!$good)
                header("Location: ./");
        } else if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
            header("Location: ./");
        }
        ?>
        <div>Top Secret</div>
        <div><a href="http://safetyfirst.zs6sobieski.pl">Best site no. 1</a></div>
        <div><a href="https://poznajmymiasto.pl">Best site no. 2</a></div>
        <button onclick="window.location.href = 'end.php'">Logout</button>
        <button onclick="window.location.href = 'register.php'">Register</button>
    </div>
</body>

</html>