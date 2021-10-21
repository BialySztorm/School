var wynik = 0
while(true)
{
    var liczba = prompt("Podaj liczbę: ")
    if (liczba==0||liczba=="")
        break
    wynik+=(1/liczba)
    alert("Suma odwrotności liczb wynosi: "+wynik)
}