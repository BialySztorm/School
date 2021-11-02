<?php
    session_start();
    unset($_SESSION['start']);
    // $_SESSION['start'] = 0;
    // session_destroy();
    echo "<script>window.location.href='../';</script>";
    

?>