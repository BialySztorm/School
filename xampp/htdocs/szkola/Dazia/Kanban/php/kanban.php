<!DOCTYPE html>
<html>
<?php
require "check.php";
check();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/kanban.min.css">
    <title>DDKANBAN</title>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav">
        <div class="nav--btn">
            <select>
                <option value="0">/Personal board</option>
                <option value="1">/Public board</option>
            </select>
        </div>
        <div class="nav--btn board">Board</div>
        <div class="nav--btn settings">Settings</div>
        <div class="nav--btn exit">Exit</div>
    </div>
    <div class="container">
        <iframe src="board.php"></iframe>
    </div>
    <script src="../js/kanban.js"></script>
</body>
</html>