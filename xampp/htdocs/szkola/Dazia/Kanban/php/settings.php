<!DOCTYPE html>
<html>
<?php

use PhpMyAdmin\Scripts;

require "check.php";
require "database.php";
check();
if (isset($_POST['password'])) {
    $login = $_POST['login'];
    $new_passwd = $_POST['password_n'];
    $email = $_POST['email'];
    $passwd = $_POST['password'];
    $uid = $_SESSION['isLogged'];

    $con = mysqli_connect($hostname, $username, $password, $database);
    $query = mysqli_query($con, "SELECT passwd FROM `users` WHERE id = $uid ;");

    if (password_verify($passwd, mysqli_fetch_assoc($query)['passwd'])) {
        $hash = password_hash($new_passwd, PASSWORD_BCRYPT);
        if ($new_passwd != "") {
            mysqli_query($con, "UPDATE `users` SET `login` = '$login', `passwd` = '$hash', `email` = '$email' WHERE `users`.`id` = $uid ;");
        } else {
            mysqli_query($con, "UPDATE `users` SET `login` = '$login', `email` = '$email' WHERE `users`.`id` = $uid ;");
        }
        echo "<script>var pass = 1</script>";
    } else {
        echo "<script>var pass = 0</script>";
    }

    mysqli_close($con);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/settings.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <?php
        $con = mysqli_connect($hostname, $username, $password, $database);
        $query = mysqli_query($con, "SELECT login, email FROM `users` WHERE id = '" . $_SESSION['isLogged'] . "';");
        $row = mysqli_fetch_assoc($query);
        ?>
        <form action="settings.php" method="POST" name="change_form">
            <input type="text" name="login" value="<?php echo $row['login']; ?>" placeholder="Login">
            <input type="password" name="password_n" placeholder="New password">
            <input type="password" name="password-copy" placeholder="New password again">
            <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="New e-mail">
            <input type="email" name="email-copy" value="<?php echo $row['email']; ?>" placeholder="New e-mail again">
            <input type="password" name="password" placeholder="Type current password" required>
            <input type="button" name="submit_btn" onclick="submitCheck()" value="Submit">
        </form>
        <?php
        mysqli_close($con);
        ?>
        <div class="error"></div>

    </div>
    <script>
        function submitCheck() {
            let inputs = document.getElementsByTagName("input")
            if (inputs[1].value == inputs[2].value && inputs[3].value == inputs[4].value) {
                document.change_form.submit();
            } else if (inputs[1].value != inputs[2].value) {
                document.getElementsByClassName('error')[0].innerHTML = "Podane hasła muszą być takie same"
            } else if (inputs[3].value != inputs[4].value) {
                document.getElementsByClassName('error')[0].innerHTML = "Podane e-maile muszą być takie same"
            }
        }
        try {
            if (pass != 1) {
                document.getElementsByClassName('error')[0].innerHTML = 'Błędne hasło'
            }
        } catch{
            // console.log("Pass is not defined")
        }
    </script>

</body>

</html>