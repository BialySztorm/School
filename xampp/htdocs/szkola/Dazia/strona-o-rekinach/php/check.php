<?php
session_start();
function check($page = true)
{
    if (!isset($_SESSION['isLogged']) && $page) {
        header('Location: login_page.php');
    } elseif (isset($_SESSION['isLogged']) && !$page) {
        header('Location: courses.php');
    }
}
function check1(){
    if (isset($_SESSION['isLogged']))
        return true;
    return false;
}