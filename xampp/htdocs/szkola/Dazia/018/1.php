<?php
//* Specify the localization
$localization = ".";
//* Scan dir for files
$scan = scandir($localization);
//* create table vars
$catalogs = [];
$files = [];
//* get scanned files to correct tables
foreach ($scan as $file) {
    if (is_file($file)) {
        array_push($files, $file);
    } elseif (is_dir($file)) {
        array_push($catalogs, $file);
    }
}
//* print dirs
echo "Dirs:<br>";
foreach ($catalogs as $dir) {
    echo "$dir <br>";
}
// *print files
echo "<br>Files:<br>";
foreach ($files as $file) {
    echo "$file <br>";
}
?>
<?php
$file =  "02.txt";
$handle = fopen($file, "w");
$tmp = "";
for ($i = 2; $i <= 1000; $i += 2) {
    if (($i % 3) == 0) {
        $tmp .= "$i, ";
    }
}
fputs($handle, $tmp);
fclose($handle);

$handle = fopen($file, "r");
echo fread($handle, filesize($file));
?>
<?php
$tmp = [];
$file = "03.txt";
$handle = fopen($file, "r");
for ($i = 0; $i < 4; $i++) {
    array_push($tmp, fgets($handle));
}
fclose($handle);
sort($tmp, SORT_NUMERIC);
foreach ($tmp as $i) {
    echo "$i, ";
}
?>
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