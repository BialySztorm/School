<html>
<span class="pad">
<link rel="stylesheet" href="css\style.css">
<link rel="stylesheet" href="css\menu.css">

<div class="overflow NVis" onclick="closePU()"></div>
<div class="pop-up NVis">
    <div>
        <label for="ilosc">Podaj ilość: </label>
        <input type="number" name="ilosc" value="0" min="0">
    </div>
    <button>Zatwierdź</button>
    <button onclick="closePU()">Anuluj</button>
</div>

<!-- /////////////// PHP //////////////// -->

<?php

    $list = [];    

    require_once('connection.php');
    echo "<h1>Menu:</h1>";

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        $connection -> query ('SET NAMES utf8');
        $connection -> query ('SET CHARACTER_SET utf8_unicode_ci');

        $produkty = @$connection->query("SELECT * FROM Menu");

        echo "<div class='container'>";
        while($curr_product = $produkty->fetch_assoc()) {
            $list[] = [$curr_product['nazwa'], $curr_product['cena'], $curr_product["ilosc"], $curr_product['ProduktID']];

            echo "<div ";
            echo ($curr_product["ilosc"] == 0)? 'class="NA"' : "";
            echo "> <p>".$curr_product['nazwa']."</p>
            <p>Cena: ".$curr_product['cena'].'</p>
            <img src="produkty\id'.$curr_product['ProduktID'].'.jpg">'.
            "</div>";
        }
        echo "</div>";
        $_SESSION['JSON'] = json_encode($list);
        $produkty->free_result();
        $connection->close();
    } catch(Error $e) {
        echo "<h1> Error".$e."</h1>";
    }
?>

<div class="cart"></div>
<script>
    sessionStorage.setItem('list', <?php echo $_SESSION['JSON'];?>)
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js\menu.js"></script>

</span>
</html>