<!DOCTYPE html>
<html>
<?php
require "php/check.php";
check(false);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.min.css">
    <title>DDKANBAN - login</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Google reCAPTCHA CDN -->
    <script src="https://www.google.com/recaptcha/api.js" async defer>
    </script>

</head>

<body>
    <div class="container">
        <h1>Login to your Kanban</h1>

        <!-- HTML Form -->
        <form action="php/login.php" method="post">
            <input type="text" name="login" id="login" placeholder="Enter Login" required>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>

            <!-- div to show reCAPTCHA -->
            <div class="g-recaptcha" data-sitekey="6LcmZRsfAAAAACcESy0gPwZKzEFF1k8_TVhEt7gI"></div>
            <button type="submit" name="submit_btn">
                Submit
            </button>
        </form>
        <div>Not registered yet? <a href="php/register.php">Register here!</a></div>
    </div>
</body>

</html>