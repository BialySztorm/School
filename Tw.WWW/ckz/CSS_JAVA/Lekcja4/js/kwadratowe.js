var a = parseFloat(prompt("podaj a: "));
var b = parseFloat(prompt("podaj b: "));
var c = parseFloat(prompt("podaj c: "));
var wynik = (b*b)-(4*a*c);
if (wynik>0)
    document.write("<div>To równanie kwadratowe ma dwa rozwiązania<br>Rozwiązanie pierwsze: "+(Math.round((-b+Math.sqrt(wynik))/(2*a)*100)/100)+"<br>Rozwiązanie drugie: "+(Math.round((-b-Math.sqrt(wynik))/(2*a)*100)/100)+"</div>");
else if (wynik==0)
    document.write("<div>To równanie kwadratowe ma jedno rozwiązanie<br>Rozwiązanie: "+(Math.round((-b)/(2*a)*100)/100)+"</div>");
else if (wynik<0)
    document.write("<div>To równanie kwadratowe nie ma rozwiązań</div>");
else
    document.write("<div>Błędne liczby</div>");