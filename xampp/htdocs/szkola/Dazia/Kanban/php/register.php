<!DOCTYPE html>
<html>
<?php

use PhpMyAdmin\SqlParser\Utils\Query;

require "check.php";
require "database.php";
check(false);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.min.css">
    <title>DDKANBAN - register</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Google reCAPTCHA CDN -->
    <script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>

</head>

<body>
    <div class="container">
        <h1>Register a new Kanban profile</h1>

        <!-- HTML Form -->
        <form action="register.php" method="post" name="register_form" id="register_form">
            <input type="text" name="login" id="login" placeholder="Enter Login" required>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <input type="password" name="password_copy" id="password_copy" placeholder="Enter Password again" required>
            <input type="email" name="email" id="email" placeholder="Enter E-mail" required>
            <input type="email" name="email_copy" id="email_copy" placeholder="Enter E-mail again" required>

            <!-- div to show reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LcmZRsfAAAAACcESy0gPwZKzEFF1k8_TVhEt7gI"></div>
            <input type="button" name="submit_btn" onclick="submitCheck()" value="Submit">
        </form>
    </div>
    <script>
        function submitCheck() {
            let inputs = document.getElementsByTagName("input")
            if(inputs[1].value == inputs[2].value && inputs[3].value == inputs[4].value){
                console.log("yup")
                document.register_form.submit();
            }
        }
    </script>
    <?php

    // Checking valid form is submitted or not

    if (isset($_POST['login'])) {

        // Storing name in $name variable
        $login = $_POST['login'];
        $passwd = $_POST['password'];
        $email = $_POST['email'];
        // Storing google recaptcha response
        // in $recaptcha variable
        $recaptcha = $_POST['g-recaptcha-response'];
        // Put secret key here, which we get
        // from google console
        $secret_key = '6LcmZRsfAAAAAM3Z9lkzemvCfTtmRkc8hV_5NQxQ';
        // Hitting request to the URL, Google will
        // respond with success or error scenario
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
            . $secret_key . '&response=' . $recaptcha;
        // Making request to verify captcha
        $response = file_get_contents($url);
        // Response return by google is in
        // JSON format, so we have to parse
        // that json
        $response = json_decode($response);

        // Checking, if response is true or not
        if ($response->success == true) {
            // echo '<script>alert("Google reCAPTCHA verified")</script>';
            $passwd = password_hash($passwd, PASSWORD_BCRYPT);
            $con = mysqli_connect($hostname, $username, $password, $database);
            $query = mysqli_query($con,"SELECT COUNT(id) FROM `users` WHERE login Like '$login';");
            if(mysqli_fetch_assoc($query)['COUNT(id)']==0)
                $query = mysqli_query($con, "INSERT INTO `users` (`login`, `passwd`, `email`) VALUES ('$login', '$passwd', '$email');");
            else
                echo '<script>alert("login is taken")</script>';
        } else {
            echo '<script>alert("Error in Google reCAPTCHA")</script>';
        }
    }

    ?>
</body>

</html>