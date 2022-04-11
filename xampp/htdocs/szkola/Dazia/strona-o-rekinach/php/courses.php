<!DOCTYPE html>
<html>
<?php
require "database.php";
require "check.php";
check();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <title>DDKANBAN</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="nav">
        <div class="nav--btn courses">Courses</div>
        <div class="nav--btn exit">EXIT</div>
    </div>
    <div class="container">
        <table>
        <?php
        $con = mysqli_connect($hostname, $username, $password, $database);
        $query = mysqli_query($con, "SELECT * FROM courses");
        if (check1()) {
            $query1  = mysqli_query($con, "SELECT courses FROM users where id LIKE '" . $_SESSION['isLogged'] . "'");
            $courses = explode(";",mysqli_fetch_assoc($query1)['courses']);
        }

        while ($row = mysqli_fetch_assoc($query)) {
            if (in_array($row['id'], $courses)) {
                echo "<tr>";
                echo "<td> <img id='rekiny' src='../" . $row['img'] . "'> </td>";
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
                echo "<input type='submit' name='wybierz' value='Przejdź do kursu'>";
                echo "</td>";
                echo "</tr>";
            }
        }
        mysqli_close($con);
        ?>
        </table>
    </div>
    <script>
        $(".exit").click(function() {
            document.location.href = "logout.php"
        })
        $(".courses").click(function() {
            document.location.href = "../strona_o_rekinach.php"
        })
    </script>
</body>

</html>