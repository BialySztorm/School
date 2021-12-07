<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formularz sql</title>
    <link rel="stylesheet" href="css/main.min.css">
</head>

<body>
    <form class="form" action="" method="POST">
        <input type="text" name="imie" placeholder="Imię" class="form__field">
        <input type="text" name="nazwisko" placeholder="Nazwisko" class="form__field">
        <input type="number" name="wiek" placeholder="Wiek" class="form__field">
        <input type="text" name="klasa" placeholder="Klasa" class="form__field">
        <input type="submit" value="wstaw" class="form__field">
    </form>
    <?php
    if (isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["wiek"]) && isset($_POST["klasa"])) {
        $imie =  $_POST["imie"];
        $nazwisko =  $_POST["nazwisko"];
        $wiek =  $_POST["wiek"];
        $klasa =  $_POST["klasa"];
        $con = mysqli_connect("localhost", "root", "", "baza");
        mysqli_query($con,"INSERT INTO `uczestnicy` (`id`, `imie`, `nazwisko`, `wiek`, `klasa`) VALUES (NULL, '$imie', '$nazwisko', '$wiek', '$klasa')");
        mysqli_close($con);
    }
    echo "<div class='result'>";
        echo "<table class='result__table'>";
        echo "<tr><th class='result__table--header'>Imię</th><th class='result__table--header'>Nazwisko</th><th class='result__table--header'>Wiek</th><th class='result__table--header'>Klasa</th></tr>";

        $con = mysqli_connect("localhost", "root", "", "baza");
        $data = mysqli_query($con, "SELECT * FROM `uczestnicy`");
        while ($curr = mysqli_fetch_assoc($data)) {
            echo "<tr>";
            echo "<td class='result__table--normal'>" . $curr["imie"] . "</td>";
            echo "<td class='result__table--normal'>" . $curr["nazwisko"] . "</td>";
            echo "<td class='result__table--normal'>" . $curr["wiek"] . "</td>";
            echo "<td class='result__table--normal'>" . $curr["klasa"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
        mysqli_close($con);

    ?>
    <div class="links">
        <a href="index.php">Powrót</a>
    </div>
</body>

</html>