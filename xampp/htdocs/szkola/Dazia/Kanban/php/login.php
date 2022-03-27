
<?php
require "database.php";
// Checking valid form is submitted or not

if (isset($_POST['submit_btn'])) {

    // Storing name in $name variable
    $login = $_POST['login'];
    $passwd = $_POST['password'];

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
    // echo '<script>console.log("'.$response.'")</script>';
    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);

    // Checking, if response is true or not
    if ($response->success == true) {
        // echo '<script>alert("Google reCAPTCHA verified")</script>';
        $con = mysqli_connect($hostname, $username, $password, $database);
        $query = mysqli_query($con, "SELECT id, passwd FROM `users` WHERE login = '$login';");
        $row = mysqli_fetch_assoc($query);
        $hash = $row['passwd'];
        echo "<script>alert('$hash')</script>";

        if (password_verify($passwd, $hash)) {
            echo '<script>alert("logged")</script>';
            session_start();
            $_SESSION['isLogged'] = $row['id'];
            header('Location: kanban.php');
        } else {
            header('Location: ./');
        }
    } else {
        // echo '<script>alert("Error in Google reCAPTCHA")</script>';
        header('Location: ../');
    }
}

?>