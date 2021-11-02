<html>

<head>
    <link rel="stylesheet" href="012.css">
    <meta charset="UTF-8">
</head>

<body>

    <?php
    if (isset($_POST['id']) && isset($_POST['ure'])) {
        $id = $_POST['id'];
        $ure = $_POST['ure'];
        $con = mysqli_connect('localhost', 'root');
        mysqli_select_db($con, 'baza');
        mysqli_query($con, 'INSERT INTO ure (`id_pracownika`, `data_uprawnien`) VALUES ("' . $id . '", "' . $ure . '")');
        mysqli_close($con);
    }
    ?>
    <div>
        <form action="012-form_1.php" method="POST">
            <input type="text" name="imie" placeholder="Imię">
            <input type="text" name="nazwisko" placeholder="Nazwisko">
            <select name="stanowisko" placeholder="Stanowisko">
                <?php
                echo "<div><table>";
                $con = mysqli_connect('localhost', 'root');
                mysqli_select_db($con, 'baza');
                mysqli_query($con, 'SET NAMES utf8');
                mysqli_query($con, 'SET CHARACTER_SET utf8_unicode_ci');

                $dane = mysqli_query($con, "SELECT * FROM `stanowiska`");
                while ($curr_line = mysqli_fetch_assoc($dane)) {
                    echo "<option value='" . $curr_line['id_stanowiska'] . "'>" . $curr_line['nazwa_stanowiska'] . "</option>";
                }

                mysqli_close($con);
                ?>
            </select>
            <input type="submit" value="Zatwierdź">
        </form>
    </div>

</body>

</html>