<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl5.css">
    <title>Portal społecznościowy</title>
</head>

<body>
    <header>
        <div>
            <h2>Nasze osiedle</h2>
        </div>
        <div>
            <?php
            $con = mysqli_connect("localhost", "root", "", "portal");
            $dane = mysqli_query($con, "SELECT COUNT(id) AS ile FROM dane;");
            echo "<h5>Liczba użytkowników portalu: " . mysqli_fetch_array($dane)['ile'] . "</h5>";
            mysqli_close($con);
            ?>
        </div>
    </header>
    <article>
        <div>
            <h3>Logowanie</h3>
            <form action="" method="post">
                login<br>
                <input type="text" name="login"><br>
                hasło<br>
                <input type="text" name="pass"><br>
                <input type="submit" value="Zaloguj">
            </form>
        </div>
        <div>
            <h3>Wizytówka</h3>
            <div>
                <?php
                if (isset($_POST['login']) && isset($_POST['pass'])) {
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];
                    $con = mysqli_connect("localhost", "root", "", "portal");
                    $dane = mysqli_query($con, "SELECT haslo from uzytkownicy WHERE login = '$login'");
                    $i = false;
                    $good = false;
                    while (true) {
                        if ($curr = mysqli_fetch_array($dane)) {
                            $i = true;
                            if (sha1($pass == $curr['haslo'])) {
                                $good = true;
                            }
                        } else {
                            if (!$i)
                                echo "<script>alert('login nie istnieje')</script>";
                            else if (!$good)
                                echo "<script>alert('hasło nieprawidłowe')</script>";
                            break;
                        }
                    }
                    if ($good) {
                        $dane1 = mysqli_query($con, "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM dane INNER JOIN uzytkownicy ON dane.id = uzytkownicy.id WHERE login = '$login'");
                        $row = mysqli_fetch_array($dane1);
                        echo "<img src='" . $row['zdjecie'] . "' alt='osoba'>";
                        echo "<h4>$login (" . date('Y') - $row['rok_urodz'] . ")</h4>";
                        echo "<p>hobby:" . $row['hobby'] . "</p>";
                        echo "<h1><img src='icon-on.png'>" . $row['przyjaciol'] . "</h1>";
                        echo "<form action='dane.html'>";
                        echo "<input type='submit' value='Więcej informacji'>";
                        echo "</form>";
                    }
                    mysqli_close($con);
                }
                ?>
            </div>
        </div>
    </article>
    <footer>
        Stronę wykonał: Andrzej Manderla
    </footer>
</body>

</html>