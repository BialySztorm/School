<html>

<head>
    <link rel="stylesheet" href="style_trzy_tabele.css">
    <meta charset="UTF-8">
</head>

<body id="form">

    <input type="button" id="Button2" value="Menu" onclick="document.location='menu.html'">

    <?php
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'baza2');
    if (isset($_POST['kategoria']) && isset($_POST['lyzwiarz']) && isset($_POST['punkty_short']) && isset($_POST['punkty_free'])) {
        $kategoria = $_POST['kategoria'];
        $lyzwiarz = $_POST['lyzwiarz'];
        $punkty_short = $_POST['punkty_short'];
        $punkty_free = $_POST['punkty_free'];
        $punkty_All = 0;
        if(is_float($punkty_short)&&is_float($punkty_free))
        $punkty_All = $punkty_short + $punkty_free;
        mysqli_query($con, "INSERT INTO zawody (`Kategoria`,`ID_lyzwiarza`,`Punkty_Short`,`Punkty_Free`,`Punkty_All`) VALUES ('$kategoria','$lyzwiarz','$punkty_short','$punkty_free','$punkty_All')");
        $dane = mysqli_query($con, "SELECT lyzwiarze.PersonalBest FROM lyzwiarze Where lyzwiarze.ID = '$lyzwiarz'");
        $curr_line = mysqli_fetch_assoc($dane);
        if($curr_line['PersonalBest']<$punkty_All){
            mysqli_query($con, "UPDATE `lyzwiarze` SET `PersonalBest` = '$punkty_All' WHERE `lyzwiarze`.`ID` = $lyzwiarz");
        }
    }
    mysqli_close($con);
    ?>
    <form action="formularz.php" method="POST">
        <select name="kategoria">
            <option value="Men">Men</option>
            <option value="Ladies">Ladies</option>
            <option value="Team">Team</option>
            <option value="Men Junior">Men Junior</option>
            <option value="Ladies Junior">Ladies Junior</option>
            <option value="Team Junior">Team Junior</option>
        </select>
        <select name="lyzwiarz">
            <?php
            $con = mysqli_connect('localhost', 'root');
            mysqli_select_db($con, 'baza2');
            $dane = mysqli_query($con, "SELECT lyzwiarze.ID, lyzwiarze.Imie, lyzwiarze.Nazwisko FROM lyzwiarze");
            while ($curr_line = mysqli_fetch_assoc($dane)) {
                echo "<option value=" . $curr_line['ID'] . ">" . $curr_line['Imie'] . " " . $curr_line['Nazwisko'] . "</option>";
            }
            ?>
        </select>
        <input type="text" name="punkty_short" placeholder="Punkty - short program">
        <input type="text" name="punkty_free" placeholder="Punkty - free program">
        <input type="submit" value="Zatwierdź">
    </form>

</body>

</html>