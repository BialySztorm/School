<html>

<head>
    <link rel="stylesheet" href="014.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if (isset($_POST['marka'])) {
        require_once('connection.php');
        $marka = $_POST['marka'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query('INSERT INTO marki (`marka`) VALUES ("' . $marka . '")');
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <form action="014-form_1.php" method="POST">
        <input type="text" name="marka" placeholder="Marka">
        <input type="submit" value="Zatwierdź">
    </form>
</body>

</html>