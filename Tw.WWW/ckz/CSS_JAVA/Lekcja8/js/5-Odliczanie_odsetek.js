var X = parseInt(prompt("Podaj liczbę miesięcy przez które pracownik odkładał: "))
var Y = parseFloat(prompt("Podaj kwotę którą pracownik co miesiąc odkładał: "))
var Z = 0.08
var wynik = 0
for (var i = 0; i < X; i++) {
    wynik += Y
    wynik += wynik * Z
}
wynik *= 100
wynik = Math.round(wynik)
wynik /= 100
document.write("Pracownik zgromadzi: " + wynik)