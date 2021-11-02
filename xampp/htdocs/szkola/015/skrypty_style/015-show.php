<html>

<head>
    <link rel="stylesheet" href="015.css">
    <meta charset="UTF-8">
</head>

<body>
    <table>
        <?php
        require_once('connection.php');
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            echo "<tr><td>Firma:</td><td>Silnik:</td><td>Język programowania:</td><td>Skrypty wizualne:</td></tr>";
            $dane = @$connection->query("SELECT silnikigier.Firma,silnikigier.Silnik,jezyk.Jezyk, silnikigier.VisualScripting FROM silnikigier INNER JOIN jezyk on silnikigier.ID_Jezyka = jezyk.ID_Jezyka");
            while ($curr_line = $dane->fetch_assoc()) {
                echo '<tr>';
                echo "<td>".$curr_line['Firma']."</td><td>".$curr_line['Silnik']."</td><td>".$curr_line["Jezyk"]."</td><td>".$curr_line['VisualScripting']."</td>" ;
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