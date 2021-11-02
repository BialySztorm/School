
<?php
if (isset($_POST['title']) && isset($_POST['type'])&& isset($_POST['year'])&& isset($_POST['score'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $year = $_POST['year'];
    $score = $_POST['score'];
    $connection = mysqli_connect("localhost", "root");
    mysqli_select_db($connection, "dane");
    if(mysqli_query($connection,"INSERT INTO `filmy` (`id`, `gatunki_id`, `rezyserzy_id`, `tytul`, `rok`, `ocena`) VALUES (NULL, '$type', '0', '$title', '$year', '$score');"))
        echo "<div>Film  $title  został  dodany  do  bazy</div>";
    else
        echo "<div>Film  $title  nie został  dodany  do  bazy, błędne dane</div>";
    mysqli_close($connection);
}
else{
    echo "<div>Wprowadzono złe dane</div>";
}
?>
<div><a href="./">Powróć do strony głównej</a></div>