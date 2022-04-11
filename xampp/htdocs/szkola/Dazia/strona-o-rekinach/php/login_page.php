<!DOCTYPE html>
<html>
<?php
require "check.php"; //sprawdza czy jestem zalogowana
check(false);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/login.min.css">
    <title>KANBAN - login</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <h1>Login to your Courses</h1>

        <!-- formularz -->
        <form action="login.php" method="post">
            <input type="text" name="login" id="login" placeholder="Enter Login" required>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
            <button type="submit" name="submit_btn">
                Submit
            </button>
        </form>
        <div>Not registered yet? <a href="register.php">Register here!</a></div>
        <div>Wanna back? <a href="../strona_o_rekinach.php">Click here!</a></div>
    </div>
</body>

</html>