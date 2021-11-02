<?php
// tworzenie tablicy
$tab = [];
// implementacja dwóch argumentów
$a = 5;
$b = 115;
// Pętla do wpisywania argumentów do tablicy
for($i = $a; $i<=$b; $i++)
{
    // przypisywanie nowych zmiennych do tablicy
    $tab[] = $i;
}
// implementacja zmiennej dla wyniku
$wynik = 0;
// Pętla do liczenia sumy zmiennych
for($i = 0; $i<sizeof($tab); $i++)
{
    // sumowanie dla każdego kolejnego elementu tabllicy
    $wynik += $tab[$i];
}
// wypisanie wyniku
echo $wynik;
?>