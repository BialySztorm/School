var dzialanie = parseFloat(prompt("(1-kwadrat, 2-prostokąt, 3-romb, 4-trapez, 5-trójkąt, 6-okrąg, 7-sześcian, 8-stożek, 9-walec, 10-kula) \nWybierz figure: "));
if(dzialanie == 1)
{
    var a = parseFloat(prompt("podaj a: "));
    document.write("<div>Pole tego kwadratu wynosi: "+(a*a)+"<br>Obwód tego kwadratu wynosi: "+(4*a)+"</div>");
}
else if(dzialanie == 2)
{
    var a = parseFloat(prompt("podaj a: "));
    var b = parseFloat(prompt("podaj b: "));
    document.write("<div>Pole tego prostokąta wynosi: "+(a*b)+"<br>Obwód tego prostokąta wynosi: "+(2*a+2*b)+"</div>");
}
else if(dzialanie == 3)
{
    var a = parseFloat(prompt("podaj a: "));
    var h = parseFloat(prompt("podaj h: "));
    document.write("<div>Pole tego rombu wynosi: "+(a*h)+"<br>Obwód tego rombu wynosi: "+(4*a)+"</div>");
}
else if(dzialanie == 4)
{
    var a = parseFloat(prompt("podaj a: "));
    var b = parseFloat(prompt("podaj b: "));
    var c = parseFloat(prompt("podaj c: "));
    var d = parseFloat(prompt("podaj d: "));
    var h = parseFloat(prompt("podaj h: "));
    document.write("<div>Pole tego trapezu wynosi: "+(((a+b)*h)/2)+"<br>Obwód tego trapezu wynosi: "+(a+b+c+d)+"</div>");
}
else if(dzialanie == 5)
{
    var a = parseFloat(prompt("podaj a: "));
    var b = parseFloat(prompt("podaj b: "));
    var c = parseFloat(prompt("podaj c: "));
    var h = parseFloat(prompt("podaj h od a: "));
    document.write("<div>Pole tego trójkąta wynosi: "+((a*h)/2)+"<br>Obwód tego trójkąta wynosi: "+(a+b+c)+"</div>");
}
else if(dzialanie == 6)
{
    var r = parseFloat(prompt("podaj r: "));
    document.write("<div>Pole tego koła wynosi: "+(Math.round((3.14*r*r)*100)/100)+"<br>Obwód tego koła wynosi: "+(Math.round((2*3.14*r)*100)/100)+"</div>");
}
else if(dzialanie == 7)
{
    var a = parseFloat(prompt("podaj a: "));
    document.write("<div>Pole powierzchni tego sześcianu wynosi: "+(6*a*a)+"</div>");
}
else if(dzialanie == 8)
{
    var r = parseFloat(prompt("podaj r: "));
    var l = parseFloat(prompt("podaj l: "));
    document.write("<div>Pole powierzchni tego stożka wynosi: "+(3.14*r*(r+l))+"</div>");
}
else if(dzialanie == 9)
{
    var r = parseFloat(prompt("podaj r: "));
    var h = parseFloat(prompt("podaj h: "));
    document.write("<div>Pole powierzchni tego walca wynosi: "+(Math.round((2*3.14*r*(r+h))*100)/100)+"</div>");
}
else if(dzialanie == 10)
{
    var r = parseFloat(prompt("podaj r: "));
    document.write("<div>Pole powierzchni tej kuli wynosi: "+(4*3.14*r*r)+"</div>");
}
else
{

}