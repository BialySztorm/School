<html>

<head>
    <link rel="stylesheet" href="010.css">
    <meta charset="UTF-8">
</head>

<body>
    
    <div>
        <form action="010.php" method="POST">
            <input type="text" name="imie" placeholder="Imię">
            <input type="text" name="nazwisko" placeholder="Nazwisko">
            <input type="text" name="ulica" placeholder="Ulica">
            <input type="text" name="nr_domu" placeholder="Numer Domu">
            <input type="text" name="nr_mieszkania" placeholder="Numer Mieszkania">
            <input type="text" name="miasto_zamieszkania" placeholder="Miasto Zamieszkania">
            <input type="date" name="data_urodzenia">
            <input type="text" name="miasto_urodzenia" placeholder="Miasto Urodzenia">
            <select name="wojewodztwo_urodzenia" placeholder="Wojewodztwo Urodzenia">
            <?php
            require_once('connection.php');
                try {
                    echo "<div><table>";
                    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                    $connection -> query ('SET NAMES utf8');
                    $connection -> query ('SET CHARACTER_SET utf8_unicode_ci');

                    $dane = @$connection->query("SELECT * FROM wojewodztwa");
                    while($curr_line = $dane->fetch_assoc()) {
                        echo "<option value='".$curr_line['ID_woj']."'>".$curr_line['Nazwa_wojewodztwa']."</option>";
                    }
                    $dane->free_result();
                    $connection->close();
                } catch(Error $e) {
                echo "<h1> Error".$e."</h1>";
                }
            ?>
            </select>
            <input type="submit" value="Zatwierdź">
        </form>
    </div>
</body>

</html>