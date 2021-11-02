<?php
    session_start();
    // $_SESSION['start'] = 1;
    if (!isset($_SESSION['start'])||isset($_SESSION['start'])&&$_SESSION['start'] != 1) {
        echo "<script>window.location.href='../login.html';</script>";
        return;
    }
?>
<link rel="stylesheet" href="../../css/menu.css">
<link rel="stylesheet" href="css/menu1.css">
<style>
    .container {
        width: 90vw;
        display: flex;
        flex-direction: column;
        margin-bottom: 7.5vw;
    }
    .container > div {
        width: 100%;
        height: 15vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .container span, .container p {
        width: 25%;
    }

    img {
        width: 7vw;
        height: 7vw;
    }

    .sub-changesBtn {
        width: 17vw;
        height: 5vw;
        font-size: 2vw;
        position: fixed;
        right: 3vw;
        bottom: 2vw;
    }
</style>
<?php
    require_once("connection.php");

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        $connection -> query ('SET NAMES utf8');
        $connection -> query ('SET CHARACTER_SET utf8_unicode_ci');

        $produkty = @$connection->query("SELECT * FROM Menu");

        echo "<div class='container'>";
        while($curr_product = $produkty->fetch_assoc()) {
            // $list[] = [$curr_product['nazwa'], $curr_product['cena'], $curr_product["ilosc"], $curr_product['ProduktID']];

            echo "<div ";
            echo ($curr_product["ilosc"] == 0)? 'class="NA"' : "";
            echo "> <p>".$curr_product['nazwa'].'</p>
            <span><label for="cena">Cena: <br></label><input type="number" name="cena" step="0.01" min="0.01" value="'.$curr_product['cena'].'">zł</span>
            <span><label for="ilosc">Dostępna ilość: </label><input type="number" name="ilosc" min="0" value="'.$curr_product['ilosc'].'"></span>
            <img src="..\..\produkty\id'.$curr_product['ProduktID'].'.jpg">'.
            "</div>";
        }
        echo "</div>";
        // $_SESSION['JSON'] = json_encode($list);
        $produkty->free_result();
        $connection->close();
    } catch(Error $e) {
        echo "<h1> Error".$e."</h1>";
    }
?>
<button class="sub-changesBtn">Potwierdź zmiany</button>
