<html>

<head>
    <link rel="stylesheet" href="014.css">
    <meta charset="UTF-8">
</head>

<body>
    <table>
        <?php
        require_once('connection.php');
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            echo '<tr>';
            echo '<th>ID Samochodu</th><th>Marka</th><th>Model</th>';
            echo '</tr>';
            $dane = @$connection->query("SELECT samochody.id, marki.marka, samochody.model FROM samochody INNER JOIN marki ON samochody.marka = marki.id_marki");
            while ($curr_line = $dane->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $curr_line['id'] . '</td><td>' . $curr_line['marka'] . '</td><td>' . $curr_line['model'] ;
                echo '</tr>';
            }
        } catch (Error $e) {
            echo "<h1> Error" . $e . "</h1>";
        }

        ?>
    </table>
    <script src="data.js"></script>
</body>

</html>