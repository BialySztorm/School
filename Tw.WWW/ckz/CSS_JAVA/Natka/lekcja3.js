
var a = parseFloat(prompt("Podaj liczbę a"));
var b = parseFloat(prompt("Podaj liczbę b"));
var c = parseFloat(prompt("Podaj liczbę c"));
var delta = (b*b - 4*a*c);
var x1 = (-b - Math.sqrt(delta))/ 2*a;
var x2 = (-b + Math.sqrt(delta))/ 2*a;
var x0 = -b / 2*a;


if (delta>0) { 
document.write(x1);
document.write(x2);



}
else if (delta==0) { 
document.write(x0);



}
else if(delta<0) {
document.write("brak rozwiązań");

}

