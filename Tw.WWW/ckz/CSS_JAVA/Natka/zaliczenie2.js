var a = prompt("Podaj liczbe a");
var b = prompt("Podaj liczbe b");
var c = prompt("Podaj liczbe c");
var delta = parseInt((b*b) - 4*a*c);
document.write("Wynik to: ");
if (delta>0) {
var x1 = (-b-(Math.sqrt(delta))/a*a);
var x2 = (-b+(Math.sqrt(delta))/a*a);
document.write(x1 + "oraz" + x2);

else if (delta==0) {
var x0 = (-b+(Math.sqrt(delta));
document.write(x0);
}

else if (delta<0) {
document.write("Brak wyniku.");
}


