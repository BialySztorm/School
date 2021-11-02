<?php
session_start();
// $_SESSION['start'] = 1;
if (!isset($_SESSION['start'])||isset($_SESSION['start'])&&$_SESSION['start'] != 1) {
        echo "<script>window.location.href='../login.html';</script>";

        return;
} else
    echo '<script>console.log(' . $_SESSION['start'] . ')</script>';
    
?>

<style>
    .container {
        width: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .zamowienie {
        background: #CCCCCC;
        width: 25vw;
        height: 50vh;
        margin: 1vw;
        padding: 3vh 1vw;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .zamowienie>p {
        font-weight: 600px;
        font-size: 1vw
    }

    .container h1,
    .container p {
        width: 20%;
    }

    .zamowienie>p {
        width: 100%;
        margin: 0;
        text-align: center;
        font-size: 2vw;
    }

    .list {
        height: 100%;
        margin: 2vh 0;
        width: 85%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .list div {
        width: 100%;
        height: 4vh;
        border-bottom: 2px dashed black;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .list p:first-child {
        margin: 0;
        width: 15.5vw;
    }

    .list p:last-child {
        margin: 0;
        width: 4.5vw;
    }

    .list p:last-of-type {
        text-align: end;
    }

    .gotowe-btn {
        width: 10vw;
        height: 4vh;
    }

    @media only screen and (max-width: 900px) {
        .container {
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .zamowienie {
            width: 40vw;
        }
    }
</style>
<?php
$foods = [];

require_once("connection.php");

try {
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    $connection->query('SET NAMES utf8');
    $connection->query('SET CHARACTER_SET utf8_unicode_ci');

    $produkty = @$connection->query("SELECT * FROM Menu");

    while ($curr_product = $produkty->fetch_assoc()) {
        $foods[] = $curr_product['nazwa'];
    }

    $produkty->free_result();
    $connection->close();
} catch (Error $e) {
    echo "<h1> Error" . $e . "</h1>";
}

try {
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    $zamowienia = @$connection->query("SELECT * FROM zamowienie");
    echo "<div class='container'>";
    while ($curr_zamowienie = $zamowienia->fetch_assoc()) {
        $str = explode(";", $curr_zamowienie['orderString']);

        echo '<div class="zamowienie">';
        echo '<p>' . $curr_zamowienie['name'] . " - nr." . $curr_zamowienie['zamowienieID'] . '<p>';

        echo '<div class="list">';
        echo '<div class="termin">Godzina odbioru: ' . $curr_zamowienie['time'] . '</div>';
        for ($i = 0; $i < count($str) - 1; $i++) {
            echo '<div><p>' . $foods[(int) explode("x", $str[$i])[0]] . '</p><p> x ' . explode("x", $str[$i])[1] . '</p></div>';
        }
        echo "</div>";
        echo "<button class='gotowe-btn'>GOTOWE</button>";
        echo "</div>";
    }
    echo "</div>";

    $zamowienia->free_result();
    $connection->close();
} catch (Error $e) {
    echo "<h1> Error" . $e . "</h1>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js\zamowienia-display.js"></script>