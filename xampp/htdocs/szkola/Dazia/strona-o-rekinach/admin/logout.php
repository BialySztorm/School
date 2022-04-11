<?php
session_start();
unset($_SESSION["isLogged1"]);
header('Location: login_page.php');
