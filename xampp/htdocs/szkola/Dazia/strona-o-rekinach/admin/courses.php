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
    <?php
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $level = $_POST['level'];
        $description = str_replace("\n","<br>",$description);
        $description = str_replace("\r","",$description);


        $con = mysqli_connect($hostname, $username, $password, $database);
        $query = mysqli_query($con, "INSERT INTO `courses` (`id`, `title`, `price`, `img`, `description`, `duration`, `level`) VALUES (NULL, '$title', '$price', '$img', '$description', '$duration', '$level');");
        mysqli_close($con);
    } else if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $level = $_POST['level'];
        $description = str_replace("\n","<br>",$description);
        $description = str_replace("\r","",$description);

        $con = mysqli_connect($hostname, $username, $password, $database);
        $query = mysqli_query($con, "UPDATE `courses` SET `title` = '$title', `price` = '$price', `img` = '$img', `description` = '$description', `duration` = '$duration', `level` = '$level' WHERE `courses`.`id` = $id;");
        mysqli_close($con);
    } else if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $con = mysqli_connect($hostname, $username, $password, $database);
        $query = mysqli_query($con, "DELETE FROM `courses` WHERE `courses`.`id` = $id");
        mysqli_close($con);
    }
    ?>
    <script>
        var tab = []
    </script>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="title" placeholder="Tytuł" required>
            <input type="text" name="price" placeholder="Cena" required>
            <input type="text" name="img" placeholder="Adres do zdjęcia" required>
            <textarea name="description" placeholder="Opis" required></textarea>
            <input type="text" name="duration" placeholder="Czas trwania" required>
            <input type="number" name="level" placeholder="Poziom trudności" required>
            <input type="submit" value="Dodaj" name="add">
        </form>
        <form action="" method="POST">
            <select name="id" class="select">
                <option selected disabled hidden>Choose here</option>
                <?php
                $con = mysqli_connect($hostname, $username, $password, $database);
                $query = mysqli_query($con, "SELECT * FROM `courses`;");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                    echo "<script>tab.push('" . json_encode($row) . "')</script>";
                }

                mysqli_close($con);
                ?>
            </select>
            <input class="toChange" type="text" name="price" placeholder="Cena">
            <input class="toChange" type="text" name="img" placeholder="Adres do zdjęcia">
            <textarea class="toChange" name="description" placeholder="Opis"></textarea>
            <input class="toChange" type="text" name="duration" placeholder="Czas trwania">
            <input class="toChange" type="number" name="level" placeholder="Poziom trudności">
            <input class="toChange" type="submit" value="Dodaj" name="add">
            <input type="submit" value="Zmień" name="update">
        </form>
        <form action="" method="POST">
            <select name="id" required>
                <option selected disabled hidden>Choose here</option>
                <?php
                $con = mysqli_connect($hostname, $username, $password, $database);
                $query = mysqli_query($con, "SELECT * FROM `courses`;");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                }

                mysqli_close($con);
                ?>
            </select>
            <input type="submit" value="Usuń" name="delete">
        </form>
    </div>
    <script>
        $(".exit").click(function() {
            document.location.href = "logout.php"
        })
        $(".courses").click(function() {
            document.location.href = "../strona_o_rekinach.php"
        })
        $(".select").change(function() {
            tmp = $(".toChange")
            console.log(this.selectedIndex-1);
            tmp1 = JSON.parse(tab[this.selectedIndex-1])
            tmp[0].value = tmp1.price
            tmp[1].value = tmp1.img
            tmp[2].value = tmp1.description
            tmp[3].value = tmp1.duration
            tmp[4].value = tmp1.level
        })
    </script>
</body>

</html>