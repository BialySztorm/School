function porownajLiczby(a, b) {
    return a - b;
}
document.write(tab2.sort() + "<br>");
document.write(tab2.sort(porownajLiczby) + "<br>");
// wprowadzenie zmiennych
var a = parseInt(prompt("Podaj a:"))
var b = parseInt(prompt("Podaj b:"))
var n = parseInt(prompt("Podaj długość ciągu fibonacciego:"))
document.write('<div class="calosc">')
// NWD przez odejmowanie, iteracja
var liczba1 = a
var liczba2 = b
while(liczba1!=liczba2){
    if(liczba1>liczba2){
        liczba1-=liczba2
    }
    else
    liczba2-=liczba1
}
document.write("<div>NWD przez odejmowanie, iteracja: "+liczba1+"</div>")
// NWD przez odejmowanie, rekurencja
function NWDodejmowane(liczba3,liczba4){
    var c = liczba3
    if(liczba3!=liczba4){
        if(liczba3>liczba4){
            liczba3-=liczba4
        }
        else
            liczba4-=liczba3
        c = NWDodejmowane(liczba3,liczba4)
    }
    return c;
}
document.write("<div>NWD przez odejmowanie, rekurencja: "+NWDodejmowane(a,b)+"</div>")
// NWD przez modulo, iteracja
var liczba5 = a
var liczba6 = b
while(liczba5%liczba6&&liczba6%liczba5){
    if(liczba5>liczba6){
        liczba5%=liczba6
    }
    else if(liczba6>liczba5){
        liczba6%=liczba5
    }
}
var wynik
if (liczba5>liczba6)
    wynik=liczba6
else
    wynik=liczba5
document.write("<div>NWD przez modulo, iteracja: "+wynik+"</div>")
// NWD przez modulo, rekurencja
function NWDmodulo(liczba7, liczba8) {
    var wynik
    if (liczba7 > liczba8)
        wynik = liczba8
    else
        wynik = liczba7
    if (liczba7 % liczba8 && liczba8 % liczba7) {
        if (liczba7 > liczba8) {
            liczba7 %= liczba8
        }
        else if (liczba8 > liczba7) {
            liczba8 %= liczba7
        }
        wynik = NWDmodulo(liczba7,liczba8)
    }
    return wynik
}
document.write("<div>NWD przez modulo, rekurencja: "+NWDmodulo(a,b)+"</div>")
// Ciąg Fibonacciego, iteracja
var l1 = 1
var l2 = 0
document.write("<div>Ciąg Fibonacciego, iteracja: ")
for (var i = 0; i < n; i++) {
    document.write(l1 + ", ")
    var tmp = l2
    l2 = l1
    l1 += tmp
}
document.write("</div>")
// Ciąg Fibonacciego, rekurencja
var l3 = 1
var l4 = 0
document.write("<div> Ciąg Fibonacciego, rekurencja: ")
function fibonacci(a, b, n, i) {

    document.write(a + ", ")
    var tmp = b
    b = a
    a += tmp
    i++
    if (i < n) {
        fibonacci(a, b, n, i)
    }
}
fibonacci(l3, l4, n, 0)
document.write("</div>")
document.write("</div>")