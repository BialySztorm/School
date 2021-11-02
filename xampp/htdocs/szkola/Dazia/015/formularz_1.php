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
    if (isset($_POST['imie'])&&isset($_POST['nazwisko'])&&isset($_POST['kraj'])&&isset($_POST['pb'])&&isset($_POST['trener'])) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $kraj = $_POST['kraj'];
        $pb = $_POST['pb'];
        $trener = $_POST['trener'];
        mysqli_query($con, "INSERT INTO lyzwiarze (`Imie`,`Nazwisko`,`Kraj`,`PersonalBest`,`Trener`) VALUES ('$imie','$nazwisko','$kraj','$pb','$trener')");
    }
    mysqli_close($con);
    ?>
    <form action="formularz_1.php" method="POST">
        <input type="text" name="imie" placeholder="Imię">
        <input type="text" name="nazwisko" placeholder="Nazwisko">
        <input type="text" name="kraj" placeholder="Kraj">
        <input type="text" name="pb" placeholder="Personal Best">
        <input type="text" name="trener" placeholder="Trener">
        <input type="submit" value="Zatwierdź">
    </form>
</body>

</html>