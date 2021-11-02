<html>
<head>
    <link rel="stylesheet" href="011.css">
    <meta charset="UTF-8">
</head>
<body>
<?php
require_once('connection.php');
$firma = $_POST['firma'];
$silnik = $_POST['silnik'];
$language = $_POST['jezyk'];
$vs = $_POST['vs'];
if($vs == "")
    $vs = "brak";
try {
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    try {
        $connection->query('INSERT INTO silnikigier (`Firma`, `Silnik`, `ID_Language`, `VisualScripting`) VALUES ("'.$firma.'", "'.$silnik.'", "'.$language.'", "'.$vs.'")');
    } catch(Error $e) {
        echo "<h1> Insertion Error".$e."</h1>";
    }
    
    $connection->close();
} catch(Error $e) {
    echo "<h1> Error".$e."</h1>";
}

try {
    echo "<div><table>";
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    $connection -> query ('SET NAMES utf8');
    $connection -> query ('SET CHARACTER_SET utf8_unicode_ci');

    $dane = @$connection->query("SELECT silnikigier.Firma,silnikigier.Silnik,language.Language, silnikigier.VisualScripting FROM silnikigier INNER JOIN language on silnikigier.ID_Language = language.ID_Language");
    echo "<tr><td>Firma:</td><td>Silnik:</td><td>Język programowania:</td><td>Skrypty wizualne:</td></tr>";
    $i = 0;
    while($curr_line = $dane->fetch_assoc()) {
        echo "<tr";
        if(!($i%2)){
            echo ' class="parzyste"';
        };
        echo "><td>".$curr_line['Firma']."</td><td>".$curr_line['Silnik']."</td><td>".$curr_line["Language"]."</td><td>".$curr_line['VisualScripting']."</td></tr>";
        $i++;
    }
    echo "</table></div>";
    $dane->free_result();
    $connection->close();
} catch(Error $e) {
    echo "<h1> Error".$e."</h1>";
}
?>
</body>
</html>