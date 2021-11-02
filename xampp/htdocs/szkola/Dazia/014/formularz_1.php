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
    if (isset($_POST['marka'])) {
        $marka = $_POST['marka'];
        mysqli_query($con, 'INSERT INTO marki (`marka`) VALUES ("' . $marka . '")');
    }
    ?>
    <form action="formularz_1.php" method="POST">
        <input type="text" name="marka" placeholder="Marka">
        <input type="submit" value="Zatwierdź">
    </form>
</body>

</html>