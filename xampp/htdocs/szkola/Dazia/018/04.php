<?php
$tmp = "";
for ($i = 0; $i < 10; $i++) {
    $tmp .= rand(0, 100) . "\n";
}
$file = "04.txt";
$handle = fopen($file, "w");
fwrite($handle, $tmp);
fclose($handle);
$handle = fopen($file, "r");
$tmp = [];
while (!feof($handle)) {
    array_push($tmp, fgets($handle));
}
echo max($tmp);
?>