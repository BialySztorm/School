<!DOCTYPE html>
<html>

<head>

</head>

<body>
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
            if (password_verify($password, $curr['password']))
                $_SESSION['logged_in'] = true;
            else
                header("Location: ./");
        }         
    }
    else if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
        header("Location: ./");
    }
    ?>
    Top Secret
    <button onclick="window.location.href = 'end.php'">Logout</button>
    <button onclick="window.location.href = 'register.php'">Register</button>

</body>

</html>