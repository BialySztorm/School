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