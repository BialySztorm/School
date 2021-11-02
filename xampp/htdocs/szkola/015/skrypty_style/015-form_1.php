<html>

<head>
    <link rel="stylesheet" href="015.css">
    <meta charset="UTF-8">
</head>

<body>
    <?php
    if (isset($_POST['jezyk'])) {
        require_once('connection.php');
        $jezyk = $_POST['jezyk'];
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query('INSERT INTO jezyk (`Jezyk`) VALUES ("' . $jezyk . '")');
        } catch (Error $e) {
            echo "<h1> Insertion Error" . $e . "</h1>";
        }
    }
    ?>
    <form action="015-form_1.php" method="POST">
        <input type="text" name="jezyk" placeholder="Język programowania">
        <input type="submit" value="Zatwierdź">
    </form>
</body>

</html>