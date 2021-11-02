<html>

<head>
    <link rel="stylesheet" href="015.css">
    <meta charset="UTF-8">
</head>

<body>

    <?php
    if (isset($_POST['firma']) && isset($_POST['silnik'])&& isset($_POST['jezyk'])&& isset($_POST['skrypty'])) {
        require_once('connection.php');
        $firma = $_POST['firma'];
        $silnik = $_POST['silnik'];
        $jezyk = $_POST['jezyk'];
        $skrypty = $_POST['skrypty'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query("INSERT INTO silnikigier (`Firma`, `Silnik`, `ID_Jezyka`, `VisualScripting`) VALUES ('$firma' , '$silnik', '$jezyk', '$skrypty')");
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <div>
        <form action="015-form.php" method="POST">
        <input type="text" name="firma" placeholder="Firma">
        <input type="text" name="silnik" placeholder="Silnik">
            <select name="jezyk" placeholder="Język">
                <?php
                require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection->query('SET NAMES utf8');
                    $connection->query('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT * FROM `jezyk`");
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo "<option value='" . $curr_line['ID_Jezyka'] . "'>" . $curr_line['jezyk'] . "</option>";
                    }

                    $connection->close();
                } catch (Error $e) {
                    echo "<h1> Error" . $e . "</h1>";
                }
                ?>
            </select>
            <input type="text" name="skrypty" placeholder="Skrypty wizualne">
            <input type="submit" value="Zatwierdź">
        </form>
    </div>

</body>

</html>