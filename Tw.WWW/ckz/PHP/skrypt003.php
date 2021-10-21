<html>

<head>
   <link rel="stylesheet" href="style003.css">
</head>

<body>
   <?php
echo "<div>";
$a = 2;
$b = 7;
$c = $a;
for ($i = 0; $i< $b; $i++)
{
    $c *= $a;
}
echo "$a^$b = $c<br><br>";
echo "</div>";
echo "<div>";
$text = "";
$k=0;
for ($i = 0; $i<4; $i++)
{
    for ($j = 0; $j<5; $j++)
    {
        if($k%2==0)
            $text.="cosiek, ";
        else
            $text.="ktosiek, ";
        $k++;
    }
     $text.="<br>";
}
echo $text;
echo "</div>";
echo "<div>";
echo "<table>";
echo "<tr>";
for($i = 0; $i<11; $i++)
{
    echo "<td class=\"
            opisl\">";
    echo "($i)";
    echo "</td>";
}
echo "</tr>";
$i=1; 
while($i<11)
{
    echo "<tr>";
    echo "<td class=\"
            opisl\">";
    echo "($i)";
    echo "</td>";
   $j=1;
    while($j<11)
    {
        if($i*$i==$j*$j)
        {
            echo "<td class=\"
            inne\">";
            echo $i*$j;
            echo "</td>";
        }
        else
        {
            echo "<td>";
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
</body>

</html>
