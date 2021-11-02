<html>

<head>
    <link rel="stylesheet" href="015.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if (isset($_POST['id'])) {
        require_once('connection.php');
        $id = $_POST['id'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query("DELETE FROM `silnikigier` WHERE `ID` = $id");
            $connection->close();
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <div>
        <form action="015-delete.php" method="POST">
            <select name="id" placeholder="ID">
                <?php
                require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection->query('SET NAMES utf8');
                    $connection->query('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT silnikigier.ID, silnikigier.Firma FROM silnikigier");
                    while ($curr_line = $dane->fetch_assoc()) {
                        echo "<option value='" . $curr_line['ID'] . "'>" . $curr_line['Firma'] . "</option>";
                    }

                    $connection->close();
                } catch (Error $e) {
                    echo "<h1> Error" . $e . "</h1>";
                }
                ?>
            </select>
            <input type="submit" value="Zatwierdź">
        </form>
    </div>
</body>

</html>