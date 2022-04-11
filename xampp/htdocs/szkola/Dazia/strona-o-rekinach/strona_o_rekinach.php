<!DOCTYPE html>
<html>
<?php
require "php/database.php";
require "php/check.php";

?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Strona o rekinach</title>
</head>

<body>
    <div id="image">
        <center>
            <div id="naglowek">
                <h1 id="naglowek"> Blog Drapieżnicy Oceanów </h1>
            </div>

            <header>
                <table id="nawigacja" style="width:95%; height:50%;">
                    <th> <a href="podstrony/Rekiny.html">Rekiny </a></th>
                    <th> <a href="podstrony/Strona_quiz.html">Quiz</a></th>
                    <th> <a href="#sharkweek">Program ratowania ryb</a></th>
                    <th> <a href="php/courses.php">Kursy</a></th>
                    <th> <a href="php/login_page.php">Zaloguj</a></th>
                </table>
            </header>
        </center>

        <!-- <hr id="linia"> <br> -->

        <!-- <p id="highlight">
        Szkielet rekinów, tak jak szkielet bezżuchwowców, jest zbudowany z chrząstki. Rekiny nie posiadają pęcherza
        pławnego i gdyby przestały pływać, opadłyby na dno. Przedstawiciele niektórych gatunków rekinów większość czasu
        spędzają na dnie morza. Są też takie, które na dnie morza tylko odpoczywają. Zawierająca tlen woda dostaje się w
        okolice skrzeli poprzez usytuowane za oczami otwory zwane tryskawkami. Gdyby woda z tlenem była wciągana przez
        jamę gębową, byłaby zanieczyszczona piaskiem lub mułem. <br><br>

        Ciało rekina, tak jak innych ryb chrzęstnoszkieletowych, jest pokryte tak zwanymi łuskami plakoidalnymi. Łuski
        te zbudowane są z zębiny, w środku której znajduje się jama i nerwy, co przypomina budowę zębów kręgowców
        lądowych. Zęby rekina są przekształconymi łuskami plakoidalnymi. Ponieważ wszystkie pozostałe kręgowce, także
        człowiek, mają wspólnego przodka z rybami chrzęstnoszkieletowymi, liczni naukowcy uważają, że nasze zęby to
        przekształcone łuski plakoidalne protoplasty kręgowców.
    </p> <br> -->

    </div>



    <!-- <hr id="odstęp"> -->
    <br>

    <h1> Rodzaje Rekinów </h1>

    <br> <br>
    <form class="wyszukiwarka" action="" method="POST">
        <input type="text" name="warunek" placeholder="fraza do  wyszukania">
        <input type="submit" value="Szukaj" name="szukaj">
    </form>

    <table id="tabela" width="80%" height="900px" align="center">
        <?php
        if(isset($_POST['wybierz'])){
            $choose  = substr($_POST['wybierz'],15);
            $con = mysqli_connect($hostname, $username, $password, $database);
            $query1  = mysqli_query($con, "SELECT courses FROM users WHERE id LIKE '" . $_SESSION['isLogged'] . "'");
            $row= mysqli_fetch_assoc($query1);
            $output = "";
            if($row['courses'] == "")
                $output = $choose;
            else
            {
                $output = $row['courses'].";$choose";
            }
            $query = mysqli_query($con, "UPDATE `users` SET `courses` = '$output' WHERE `users`.`id` = ".$_SESSION['isLogged'].";");
            mysqli_close($con);
        }
        if (isset($_POST['szukaj'])) {
            $warunek = $_POST['warunek'];
            $con = mysqli_connect($hostname, $username, $password, $database);
            $query = mysqli_query($con, "SELECT * FROM courses Where title LIKE '%$warunek%'");
            if (check1()) {
                $query1  = mysqli_query($con, "SELECT courses FROM users where id LIKE '" . $_SESSION['isLogged'] . "'");
                $courses = mysqli_fetch_assoc($query1)['courses'];
            }

            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td> <img id='rekiny' src='" . $row['img'] . "'> </td>";
                echo "<td>";
                echo "<div>" . $row['title'] . "</div>";
                echo "<div>";
                echo "<div>" . $row['duration'] . "</div>";
                for ($i = 0; $i < $row['level']; $i++) {
                    echo "<div><img class='star' src='https://cdn-icons-png.flaticon.com/512/13/13587.png'></div>";
                }
                echo "<div>" . $row['price'] . "</div>";
                echo "</div>";
                echo "<div>" . $row['description'] . "</div>";
                if (check1()) {
                    if(!in_array($row['id'],explode(";",$courses)))
                        echo "<form action='' method='POST'><input type='submit' name='wybierz' value='Zakup kurs nr: " . $row['id'] . "'></form>";
                }
                echo "</td>";
                echo "</tr>";
            }
            mysqli_close($con);
        } else {
            $con = mysqli_connect($hostname, $username, $password, $database);
            $query = mysqli_query($con, "SELECT * FROM courses");
            if (check1()) {
                $query1  = mysqli_query($con, "SELECT courses FROM users where id LIKE '" . $_SESSION['isLogged'] . "'");
                $courses = mysqli_fetch_assoc($query1)['courses'];
            }
            $iter = 0;

            while (($row = mysqli_fetch_assoc($query)) && $iter++ < 4) {
                echo "<tr>";
                echo "<td> <img id='rekiny' src='" . $row['img'] . "'> </td>";
                echo "<td>";
                echo "<div>" . $row['title'] . "</div>";
                echo "<div>";
                echo "<div>" . $row['duration'] . "</div>";
                for ($i = 0; $i < $row['level']; $i++) {
                    echo "<div><img class='star' src='https://cdn-icons-png.flaticon.com/512/13/13587.png'></div>";
                }
                echo "<div>" . $row['price'] . "</div>";
                echo "</div>";
                echo "<div>" . $row['description'] . "</div>";
                if (check1()) {
                    if(!in_array($row['id'],explode(";",$courses)))
                        echo "<form action='' method='POST'><input type='submit' name='wybierz' value='Zakup kurs nr: " . $row['id'] . "'></form>";
                }
                echo "</td>";
                echo "</tr>";
            }
            mysqli_close($con);
        }

        ?>

    </table>

    <div id="sharkweek">
        <img src="grafika/sharkweek.png">
    </div>
    <center>
        <p style="font-family: Raleway; font-size: 25px; color: crimson;"> Chcesz dołączyć do wyprawy by ratować rekiny
            przed nielegalnymi połowami? <br> <b>Dołącz już dziś!</b></p>
    </center>


    <div id="form">
        <form id="formularz">
            <table id="formTable" cellspacing="30">
                <tr>
                    <td>
                        <input type="text" name="imię" placeholder="Imię">
                    </td>
                    <td colspan="2">
                        <p style="text-align: center;"> Dlaczego chcesz dołączyć do wyprawy?</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="nazwisko" placeholder="Nazwisko">
                    </td>
                    <td rowspan="3" colspan="2">
                        <textarea name="dlaczego" cols="50" rows="10" placeholder="Max 250 znaków"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="mail" placeholder="E-mail">
                    </td>

                </tr>
                <tr>
                    <td>
                        Kod pocztowy : <input type="text" size="2" maxlength="2">-<input type="text" size="3" maxlength="3">
                    </td>
                </tr>
            </table>
            <center>
                <input type="submit" value="Wyślij" id="button">
            </center>

        </form>
    </div>
    <br>
    <div><a href="admin/login_page.php">Panel administratora</div>
</body>
</html>