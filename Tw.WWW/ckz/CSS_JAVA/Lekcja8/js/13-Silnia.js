var a = prompt("Podaj liczbę: ")
document.write("!" + a + " = ")
var wynik = 1
for (var i = 1; i <= a; i++) {
    if (i == 1)
        document.write(i)
    else
        document.write(" * " + i)
    wynik *= i
}
document.write(" = " + wynik)