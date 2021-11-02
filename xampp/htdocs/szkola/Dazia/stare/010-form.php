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
                $con = mysqli_connect('localhost','root');
                mysqli_select_db ($con,'baza2');
                $zap=mysqli_query($con, 'SELECT * FROM wojewodztwa');
                while($wiersz=mysqli_fetch_assoc($zap)) {
                    echo "<option value='".$wiersz['ID_woj']."'>".$wiersz['Nazwa_wojewodztwa']."</option>";
                }
                $con->close();
            ?>
            </select>
            <input type="submit" value="Zatwierdź">
        </form>
    </div>
</body>

</html>