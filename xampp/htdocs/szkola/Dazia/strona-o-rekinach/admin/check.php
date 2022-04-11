<?php
session_start();
function check($page = true)
{
    if (!isset($_SESSION['isLogged1']) && $page) {
        header('Location: login_page.php');
    } elseif (isset($_SESSION['isLogged1']) && !$page) {
        header('Location: courses.php');
    }
}