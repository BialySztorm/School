<?php
$tmp = [];
$file = "03.txt";
$handle = fopen($file,"r");
for($i = 0; $i<4; $i++)
{
    array_push($tmp,fgets($handle));
}
fclose($handle);
sort($tmp,SORT_NUMERIC);
foreach($tmp as $i){
    echo "$i, ";
}
?>