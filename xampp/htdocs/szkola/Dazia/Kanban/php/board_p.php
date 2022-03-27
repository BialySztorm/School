<!DOCTYPE html>
<html>
<?php
require "check.php";
require "database.php";
check();
if (isset($_POST['submit_add'])) {
    $group = $_POST['group'];
    $task = $_POST['task'];
    $uid = 0;

    $con = mysqli_connect($hostname, $username, $password, $database);
    $query = mysqli_query($con, "INSERT INTO `content` (`user_id`, `group_id`, `content_text`) VALUES ('$uid', '$group', '$task');");

    mysqli_close($con);
} elseif (isset($_POST['submit_manage'])) {
    $id = $_POST['id'];
    $group = $_POST['group'];
    $task = $_POST['task'];

    $con = mysqli_connect($hostname, $username, $password, $database);
    $query = mysqli_query($con, "UPDATE `content` SET `group_id` = '$group', `content_text` = '$task' WHERE `content`.`id` = '$id' ;");

    mysqli_close($con);
} elseif (isset($_POST['submit_delete'])) {
    $id = $_POST['id'];

    $con = mysqli_connect($hostname, $username, $password, $database);
    $query = mysqli_query($con, "DELETE FROM `content` WHERE `id` = '$id' ");

    mysqli_close($con);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/board.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="group">
            <div class="group--title">
                To do
                <div class="group--add" group="0">+</div>
            </div>
            <div class="group--content">
                <?php
                $con = mysqli_connect($hostname, $username, $password, $database);
                $query = mysqli_query($con, "SELECT id, content_text FROM content WHERE user_id = '0' AND group_id = '0';");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<div class='group--task' style='background-color:rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ");'><span>" . $row["content_text"] . "</span><div class='task--manage' db_id='" . $row["id"] . "'>+</div></div>";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
        <div class="group">
            <div class="group--title">
                Buffer
                <div class="group--add" group="1">+</div>
            </div>
            <div class="group--content">
                <?php
                $con = mysqli_connect($hostname, $username, $password, $database);
                $query = mysqli_query($con, "SELECT id, content_text FROM content WHERE user_id = '0' AND group_id = '1';");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<div class='group--task' style='background-color:rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ");'><span>" . $row["content_text"] . "</span><div class='task--manage' db_id='" . $row["id"] . "'>+</div></div>";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
        <div class="group">
            <div class="group--title">
                Working
                <div class="group--add" group="2">+</div>
            </div>
            <div class="group--content">
                <?php
                $con = mysqli_connect($hostname, $username, $password, $database);
                $query = mysqli_query($con, "SELECT id, content_text FROM content WHERE user_id = '0' AND group_id = '2';");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<div class='group--task' style='background-color:rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ");'><span>" . $row["content_text"] . "</span><div class='task--manage' db_id='" . $row["id"] . "'>+</div></div>";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
        <div class="group">
            <div class="group--title">
                Done
                <div class="group--add" group="3">+</div>
            </div>
            <div class="group--content">
                <?php
                $con = mysqli_connect($hostname, $username, $password, $database);
                $query = mysqli_query($con, "SELECT id, content_text FROM content WHERE user_id = '0' AND group_id = '3';");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<div class='group--task' style='background-color:rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ");'><span>" . $row["content_text"] . "</span><div class='task--manage' db_id='" . $row["id"] . "'>+</div></div>";
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
    </div>
    <div class="prompt--window">
        <div class="hide--add">X</div>
        <form action="board_p.php" method="post">
            <input class="hidden--input" type="text" name="group">
            <input type="text" name="task" placeholder="Task" required>
            <button type="submit" name="submit_add">Submit</button>
        </form>
    </div>
    <div class="prompt--window">
        <div class="hide--manage">X</div>
        <form action="board_p.php" method="post">
            <input class="hidden--input" type="text" name="id">
            <select name="group">
                <option value="0">To do</option>
                <option value="1">Buffer</option>
                <option value="2">Working</option>
                <option value="3">Done</option>
            </select>
            <input class="task--input" type="text" name="task" placeholder="Task" required>
            <button type="submit" name="submit_manage">Submit</button>
        </form>
        <form action="board_p.php" method="post">
            <input class="hidden--input" type="text" name="id">
            <button type="submit" name="submit_delete">Delete</button>
        </form>
    </div>
    <script src="../js/board.js" defer></script>
</body>

</html>