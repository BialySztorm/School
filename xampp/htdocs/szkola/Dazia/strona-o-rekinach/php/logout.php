<?php
session_start();
unset($_SESSION["isLogged"]);
header('Location: login_page.php');
