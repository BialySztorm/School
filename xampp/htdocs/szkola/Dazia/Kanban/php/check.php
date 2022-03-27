<?php
session_start();
function check($page = true){
if(!isset($_SESSION['isLogged']) && $page){
header('Location: ../');
}
elseif(isset($_SESSION['isLogged']) && !$page){
header('Location: php/kanban.php');
}
}
