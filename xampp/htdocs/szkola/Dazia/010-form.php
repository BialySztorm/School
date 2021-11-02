<html>

<head>
    <link rel="stylesheet" href="style_baza3.css">
    <meta charset="UTF-8">
</head>

<body>
    
    <div>
        <form action="010.php" method="POST">
            <input type="text" name="imie" placeholder="Imię">
            <input type="text" name="nazwisko" placeholder="Nazwisko">
            <input type="text" name="wiek" placeholder="Ulica">
            <input type="text" name="wzrost" placeholder="Numer Domu">
            <input type="text" name="bts" placeholder="Numer Mieszkania">
            <input type="text" name="pbsp" placeholder="Miasto Zamieszkania">
            <input type="text" name="pbfs">
            <select name="wojewodztwo" placeholder="Wojewodztwo">
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