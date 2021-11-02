<?php include("config.php"); ?>
<?php
// require_once("config.php");
if(isset($_POST['enter'])){
  $login = $_POST['login'];
  $password = $_POST['password'];
  // echo '<script>console.log("' . password_hash($password, PASSWORD_DEFAULT) . '")</script>';

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    $connection -> query ('SET NAMES utf8');
        $connection -> query ('SET CHARACTER_SET utf8_unicode_cs');
  $logins= $connection->query("SELECT * FROM user WHERE login LIKE '".$login."'");
  $logged = 0;
  while ($curr_login = $logins->fetch_assoc()) {
    if(password_verify($password,$curr_login['password'])){
      $logged = 1;
      break;
    }
  }
  if($logged) 
  {
        // echo 'zalogowano pomyślnie<br>';
        // echo '<a href="podstrony/admin.php">Przejdź do panelu.</a>';
        session_start();
        $_SESSION['start'] = 1;
        header('Location:podstrony/zamowienia-display.php');
  }
    else
    echo "Logowanie nieudane. Sprawdź pisownię nicku oraz hasła.";
}
?>
