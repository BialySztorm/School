<!DOCTYPE html>
<html>

<head>
    <style>
        form{
            margin: 1vw;
        }
        .comment{
            width: 50vw;
            border: 1px solid black;
            margin: 1vw;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <textarea name="comment" placeholder="Comment"></textarea>
        <input type="submit">
    </form>
    <?php
    $file = "05.txt";
    if (isset($_POST["comment"])) {
        $tmp = "";
        if (filesize($file)) {
            $handle = fopen($file, "r");
            $tmp = fread($handle, filesize($file));
            fclose($handle);
        }
        $tmp .= "<div class='comment'>" . $_POST["comment"] . "</div>";
        $handle = fopen($file, "w");
        fwrite($handle, $tmp);
        fclose($handle);
    }
    if (filesize($file)) {
        $handle = fopen($file, "r");
        $tmp = fread($handle, filesize($file));
        echo $tmp;
        fclose($handle);
    }
    ?>
</body>

</html>