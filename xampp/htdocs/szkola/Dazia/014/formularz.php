<html>

<head>
    <link rel="stylesheet" href="style_trzy_tabele.css">
    <meta charset="UTF-8">
</head>

<body id="form">

    <input type="button" id="Button2" value="Menu" onclick="document.location='menu.html'">      

    <?php
    if (isset($_POST['marka']) && isset($_POST['model'])) {
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $con = mysqli_connect('localhost', 'root');
        mysqli_select_db($con, 'baza2');
        mysqli_query($con, 'INSERT INTO samochody (`marka`, `model`) VALUES ("' . $marka . '", "' . $model . '")');
        mysqli_close($con);
    }
    ?>
    <div>
        <form action="formularz.php" method="POST">
            <select name="marka" placeholder="Marka">
                <?php
                echo "<div><table>";
                $con = mysqli_connect('localhost', 'root');
                mysqli_select_db($con, 'baza2');
                mysqli_query($con, 'SET NAMES utf8');
                mysqli_query($con, 'SET CHARACTER_SET utf8_unicode_ci');

                $dane = mysqli_query($con, "SELECT * FROM `marki`");
                while ($curr_line = mysqli_fetch_assoc($dane)) {
                    echo "<option value='" . $curr_line['id_marki'] . "'>" . $curr_line['marka'] . "</option>";
                }

                mysqli_close($con);
                ?>
            </select>
            <input type="text" name="model" placeholder="Model">
            <input type="submit" value="Zapisz">
        </form>
    </div>

</body>

</html>