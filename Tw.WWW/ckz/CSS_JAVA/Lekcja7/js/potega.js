var a = prompt("Podaj a: ")
var n = prompt("Podaj n: ")
var wynik = 1
for(var i = 0;i<n;i++)
    wynik*=a
if(a==0)
    wynik = 0
document.write(a+"^"+n+" = "+wynik)