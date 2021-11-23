<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Wędkujemy</title>
    <link rel="stylesheet" href="styl_1.css">
</head>

<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section>
    <div>
        <h2>Ryby drapieżne naszych wód</h2>
        <ul>
            <?php
                $con = mysqli_connect('localhost', "root");
                mysqli_select_db($con, 'wedkowanie');
                $data = mysqli_query($con, "SELECT `ryby`.`nazwa`, `ryby`.`wystepowanie` FROM `ryby` WHERE `ryby`.`styl_zycia` = '1'");
                while($row = mysqli_fetch_assoc($data)){
                    echo "<li>".$row['nazwa'].", występowanie: ".$row['wystepowanie']."</li>";
                }
                mysqli_close($con);
            ?>
        </ul>
    </div>
    <div>
        <img src="ryba1.jpg" alt="sum">
        <div><a href="02232006038/kwerendy.txt" download>Pobierz kwerendy</a></div>
    </div>
    </section>
    <footer>
        Stronę wykonał: Andrzej Manderla
    </footer>
</body>

</html>