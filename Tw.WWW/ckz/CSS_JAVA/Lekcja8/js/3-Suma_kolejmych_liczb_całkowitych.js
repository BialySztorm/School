var wynik = 0
for (var i = 1; i <= 10; i++) {
    if (i == 10)
        document.write(i + " = ")
    else
        document.write(i + " + ")
    wynik += i
}
document.write(wynik)