<?php
$file =  "02.txt";
$handle = fopen($file, "w");
$tmp = "";
for($i = 2; $i<=1000; $i+=2)
{
    if(($i%3) == 0){
        $tmp .= "$i, ";
    }
}
fputs($handle,$tmp);
fclose($handle);

$handle = fopen($file, "r");
echo fread($handle,filesize($file));
?>