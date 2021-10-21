var X = parseInt(prompt("Podaj szerokość podstawy ściany: "))
var Y = parseInt(prompt("Podaj wysokość ściany: "))
var Z = parseInt(prompt("Podaj o ile cegieł mamy zmiejszać ścianą co rząd: "))
var wynik = 0
document.write("Twoja ściana " + X + "X" + Y + " zużyje: ")
for (var i = 0; i < Y; i++) {
    wynik += X
    X -= Z
}
document.write(wynik + " cegieł.")