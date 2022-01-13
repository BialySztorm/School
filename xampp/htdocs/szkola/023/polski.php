<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Szkoła Ponadgimnazjalna</title>
</head>

<body>
    <header>
        <h1>Oceny uczniów: język polski</h1>
    </header>
    <article>
        <div>
            <h2>Lista uczniów: </h2>
            <ol>
                <?php
                    $con = mysqli_connect("localhost","root","","szkola");
                    $data = mysqli_query($con,  "SELECT uczen.imie, uczen.nazwisko FROM uczen");
                    while($curr = mysqli_fetch_assoc($data)){
                        echo "<li>".$curr['imie']." ".$curr['nazwisko']."</li>";
                    }
                    mysqli_close($con);
                ?>
            </ol>
        </div>
        <div>
            <h2>
                Uczeń:
                <?php
                    $con = mysqli_connect("localhost","root","","szkola");
                    $data = mysqli_query($con,  "SELECT uczen.imie, uczen.nazwisko FROM uczen WHERE uczen.id = 2");
                    while($curr = mysqli_fetch_assoc($data)){
                        echo $curr['imie']." ".$curr['nazwisko'];
                    }
                    mysqli_close($con);
                ?>
            </h2>
            <p>
                Średnia ocen z języka polskiego:
                <?php
                    $con = mysqli_connect("localhost","root","","szkola");
                    $data = mysqli_query($con,  "SELECT AVG(ocena.ocena) AS srednia FROM ocena WHERE ocena.uczen_id = 2 AND ocena.przedmiot_id  = 1");
                    while($curr = mysqli_fetch_assoc($data)){
                        echo $curr['srednia'];
                    }
                    mysqli_close($con);
                ?>
            </p>
        </div>
    </article>
    <footer>
        <h3>Zespół  Szkół  Ponadgimnazjalnych</h3>
        <p>Stronę opracował: Andrzej Manderla</p>
    </footer>
</body>

</html>