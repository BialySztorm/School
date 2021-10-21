// deklaracja tablicy
var tab1 = new Array("Tomek", "Grzesiu", "Misiu");
document.write(tab1 + "<br>");
tab1[3] = "Andrzej";
tab1[4] = "Ola";
document.write(tab1 + "<br>");
document.write("<br><br>");
// Tablica z pseudolosowymi liczbami
var tab2 = new Array();
for (var i = 0; i < 20; i++) {
    tab2[i] = Math.round(Math.random() * 100);
}
document.write(tab2 + "<br>");
document.write(tab2[tab2.length - 1] + "<br>")
document.write("<br><br>");
// Tablica asocjacyjna
var tab3 = new Array();
tab3['pies'] = "chihuahua";
tab3['kot'] = "pers";
document.write("pies: " + tab3['pies'] + "<br>kot: " + tab3['kot'] + "<br>");
document.write("<br><br>");
// tablica dwuwymiarowa
var tab4 = []
tab4[0] = ["marcin", "328"];
tab4[1] = ["michał", "123"];
tab4[2] = ["ania", "982"];
document.write("tab[0][0]: " + tab4[0][0] + " tab[0][1]: " + tab4[0][1] + "<br>");
document.write("tab[1][0]: " + tab4[1][0] + " tab[1][1]: " + tab4[1][1] + "<br>");
document.write("tab[2][0]: " + tab4[2][0] + " tab[2][1]: " + tab4[2][1] + "<br>");
document.write("<br><br>");
// wypisywanie tablicy
document.write(tab2.join(' - ') + "<br>");
function porownajLiczby(a, b) {
    return a - b;
}
document.write(tab2.sort() + "<br>");
document.write(tab2.sort(porownajLiczby) + "<br>");
document.write(tab2.reverse() + "<br>");
document.write(tab2.slice(1, 3) + "<br>");
tab2.push("666")
document.write(tab2 + "<br>");
tab2.pop()
document.write(tab2 + "<br>");
tab2.unshift("69")
document.write(tab2 + "<br>");
tab2.shift()
var tab5 = ["Gosia", "Kasia", "Krysia"]
tab5 = tab5.concat(tab1);
document.write(tab5.concat(tab1) + "<br>")
function max(tablica) {
    var maximum = tablica[0];
    for (var i = 0; i < tablica.length; i++)
        maximum = (tablica[i] > maximum) ? tablica[i] : maximum;
    return maximum
}
function min(tablica) {
    var minimum = tablica[0];
    for (var i = 0; i < tablica.length; i++)
        minimum = (tablica[i] < minimum) ? tablica[i] : minimum;
    return minimum;
}
document.write("max = " + max(tab2) + "<br>");
document.write("min = " + min(tab2) + "<br>");
function srednia(tablica) {
    var suma = 0;
    for (var i = 0; i < tablica.length; i++)
        suma += tablica[i];
    return suma / i
}
document.write("Średnia = " + srednia(tab2) + "<br>");
function mieszamy(tablica) {
    for (var i = 0; i < tablica.length; i++) {
        var j = Math.floor(Math.random() * tablica.length)
        var temp = tablica[i];
        tablica[i] = tablica[j];
        tablica[j] = temp;
    }
    return tablica
}
document.write(mieszamy(tab5) + "<br>")
document.write("<br><br>");
// konwersja bintodec i dectobin
var a = parseInt(prompt("podaj liczbę dziesiętną"));
var b = String(prompt("podaj liczbę binarną"));
function dectobin(a) {
    var a1 = "";
    while (a > 1) {
        if (a % 2)
            a1 += 1;
        else
            a1 += 0;
        a /= 2;
    }
    return a1;
}
function bintodec(b) {
    var tmp = 0;
    var pot = 0;
    for (var i = b.length - 1; i >= 0; i--) {
        if (b[i] == 1) {
            var tmp2 = 1;
            for(var j = 0; j<pot;j++)
            {
                tmp2 *=2;
            }
            tmp+=tmp2

        }
        pot++;
    }
    return tmp;
}

document.write(a + " = " + dectobin(a)+"<br>");
document.write(b + " = " + bintodec(b)+"<br>");