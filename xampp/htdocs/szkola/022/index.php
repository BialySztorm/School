<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formularz sql</title>
    <link rel="stylesheet" href="css/main.min.css">
</head>

<body>
    <form class="form" action="" method="POST">
        <select name="field" class="form__field">
            <option disabled selected>Wybierz pole</option>
            <option value="imie">Imię</option>
            <option value="nazwisko">Nazwisko</option>
            <option value="wiek">Wiek</option>
            <option value="klasa">Klasa</option>

        </select>
        <input type="text" name="criterion" placeholder="kryterium" class="form__field">
        <input type="submit" value="sprawdź" class="form__field">
    </form>
    <?php
    if (isset($_POST["field"]) && isset($_POST["criterion"])) {
        echo "<div class='result'>";
        echo "<table class='result__table'>";
        echo "<tr><th class='result__table--header'>Imię</th><th class='result__table--header'>Nazwisko</th><th class='result__table--header'>Wiek</th><th class='result__table--header'>Klasa</th></tr>";

        $field = $_POST["field"];
        $criterion = $_POST["criterion"];
        $con = mysqli_connect("localhost", "root", "", "baza");
        $data = mysqli_query($con, "SELECT * FROM `uczestnicy` WHERE `$field`LIKE '$criterion'");
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
    }

    ?>
    <div class="links">
        <a href="insert.php">Wstaw Dane</a>
    </div>
</body>

</html>