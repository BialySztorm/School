<!DOCTYPE html>
<html>
<?php

require "check.php";
require "database.php";
check(false);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.min.css">
    <title>DD Rekinki - register</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


</head>

<body>
    <div class="container">
        <h1>Register a courses profile</h1>

        <!-- formularz rejestracji -->
        <form action="register.php" method="post" name="register_form" id="register_form">
            <input type="text" name="login" id="login" placeholder="Enter Login" required>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <input type="password" name="password_copy" id="password_copy" placeholder="Enter Password again" required>
            <input type="email" name="email" id="email" placeholder="Enter E-mail" required>
            <input type="email" name="email_copy" id="email_copy" placeholder="Enter E-mail again" required>
            <input type="button" name="submit_btn" onclick="submitCheck()" value="Submit">
        </form>
        <div>Wanna back? <a href="login_page.php">Click here!</a></div>
    </div>
    <script>
        function submitCheck() {
            let inputs = document.getElementsByTagName("input")
            if (inputs[1].value == inputs[2].value && inputs[3].value == inputs[4].value) {
                console.log("yup")
                document.register_form.submit()
            }
        }
    </script>
    <?php

    // sprawdza czy formularz jest poprawny (kod recaptcha jest z internetu, pozdrawiam :>)

    if (isset($_POST['login'])) {

        $login = $_POST['login'];
        $passwd = $_POST['password'];
        $email = $_POST['email'];

        $passwd = password_hash($passwd, PASSWORD_BCRYPT);
        $con = mysqli_connect($hostname, $username, $password, $database);
        $query = mysqli_query($con, "SELECT COUNT(id) FROM `users` WHERE username Like '$login';");
        if (mysqli_fetch_assoc($query)['COUNT(id)'] == 0)
            $query = mysqli_query($con, "INSERT INTO `users` (`username`, `password`, `email`) VALUES ('$login', '$passwd', '$email');");
        else
            echo '<script>alert("login is taken")</script>';
    }

    ?>
</body>

</html>