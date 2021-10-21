<?php

$a=$_POST['nr1'];
$b=$_POST['nr2'];
$c=$_POST['nr3'];
$d=$_POST['tablesizex'];
$e=$_POST['tablesizey'];
$g=$_POST['style'];
if($g==1)
    echo "<link rel=\"stylesheet\" href=\"style004.css\">";
else
    echo "<link rel=\"stylesheet\" href=\"style003.css\">";
echo "<div>";
if($a==$b&& $b==$c)
    echo "sa rowne";
else
    echo "nie sa rowne";
echo "</div>";
echo "<div>";
echo "<table>";
echo "<tr>";
$f = $d;
if($d!=$e)
    $f+=1;
for($i = 0; $i<=$f; $i++)
{
    echo "<td class=\"
            opisl\">";
    echo "($i)";
    echo "</td>";
}
echo "</tr>";
$i=1; 
while($i<=$d)
{
    echo "<tr>";
    echo "<td class=\"
            opisl\">";
    echo "($i)";
    echo "</td>";
   $j=1;
    while($j<=$e)
    {
        if($i*$i==$j*$j)
        {
            echo '<td class="
            inne" style="animation-delay:'.$j*$i/100 .'s">';
            echo $i*$j;
            echo "</td>";
        }
        else
        {
            echo '<td style="animation-delay:'.$j*$i/100 .'s">';
            echo $i*$j;
            echo "</td>";
        }
       $j++;
    }
    echo "</tr>";
   $i++;
}
echo "</table>";
echo "</div>";
?>