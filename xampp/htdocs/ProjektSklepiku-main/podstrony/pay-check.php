<?php
    require_once("connection.php");
    
    session_start();
    $_SESSION['name'] = "Dawid Krok";

    if($_GET['BLIK'] == "784512") {
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    
            try {
                $connection->query('INSERT INTO zamowienie (`name`, `orderString`, `time`) VALUES ("'.$_SESSION['name'].'", "'.$_GET['orderString'].'", "'.$_GET['time'].'")');
                header("Location: order-end.php");
            } catch(Error $e) {
                echo "<h1> Insertion Error".$e."</h1>";
            }
            
            $connection->close();
        } catch(Error $e) {
            echo "<h1> Error".$e."</h1>";
        }
    } else {
        header("Location: order-end.php");
    }

?>