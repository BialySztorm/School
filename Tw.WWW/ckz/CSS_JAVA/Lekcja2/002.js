// dodawanie
document.write("10 + 3 = " + (10 + 3) + "<br>");
document.write('koty " + 2 = ' + ("koty " + 2) + "<br>");
document.write('37 + 2 = ' + (37 + 2) + "<br>");
document.write('"37" + 2 = ' + ("37" + 2) + "<br>");
// odejmowanie
document.write('37 - 3 = ' + (37 - 3) + "<br>");
document.write('"35" - 3 = ' + ("35" - 3) + "<br>");
document.write('"35a" - 2 = ' + ("35a" - 2) + "<br>");
// dzielenie
document.write('9 / 3 = ' + (9 / 3) + "<br>");
document.write('"9"/ 2 = ' + ("9" / 2) + "<br>");
document.write('9 / 2 = ' + (9 / 2) + "<br>");
document.write('"9i"/ 2 = ' + ("9i" / 2) + "<br>");
// mnożenie
document.write('9 * 2 = ' + (9 * 2) + "<br>");
document.write('"9"* 2 = ' + ("9" * 2) + "<br>");
document.write('"9p"* 2 = ' + ("9p" * 2) + "<br>");
// modulo
document.write('9 % 2 = ' + (9 % 2) + "<br>");
document.write('"9"% 2 = ' + ("9" % 2) + "<br>");
document.write('-8 % 3 = ' + (-8 % 3) + "<br>");
document.write('"9i"% 2 = ' + ("9i" % 2) + "<br>");
// negacja
var zmienna = 5;
document.write("zmienna = " + zmienna + "<br>");
document.write("zmienna2 = " + (-zmienna) + "<br>");
// inkrementacja
var zmienna = 10;
document.write('zmienna = ' + (zmienna) + "<br>");
zmienna++;
document.write('zmienna++ = ' + (zmienna) + "<br>");
var zmienna1 = "napis";
document.write('zmienna1 = ' + (zmienna1) + "<br>");
zmienna1++;
document.write('zmienna1++ = ' + (zmienna1) + "<br>");
// dekrementacja
var zmienna = 10;
document.write('zmienna = ' + (zmienna) + "<br>");
zmienna--;
document.write('zmienna-- = ' + (zmienna) + "<br>");
var zmienna1 = "napis";
document.write('zmienna1 = ' + (zmienna1) + "<br>");
zmienna1--;
document.write('zmienna1-- = ' + (zmienna1) + "<br>");
// przypisanie = 
var zmienna2 = 2;
var zmienna3 = "napis";
var zmienna4 = zmienna + zmienna2;
document.write('zmienna2 = ' + zmienna2 + "<br>");
document.write('zmienna3 = ' + zmienna3 + "<br>");
document.write('zmienna4 = ' + zmienna4 + "<br>");
// przypisanie +=
var cena = 2;
zmienna += cena; //jest jednoznaczne z: zmienna = zmienna + cena;
document.write("zmienna+=cena = " + zmienna + "<br>");
var zmienna = 9;
zmienna += 3; //zwróci 12
document.write("zmienna+=3 = " + zmienna + "<br>");
// przypisanie -=
zmienna -= cena; //jest jednoznaczne z: zmienna = zmienna - cena
document.write("zmienna-=cena = " + zmienna + "<br>");
var zmienna = 9;
zmienna -= 3; //zwróci 6 
document.write("zmienna-=3 = " + zmienna + "<br>");
// przypisanie *=
zmienna *= cena;// jest jednoznaczne z: zmienna = zmienna * cena
document.write("zmienna*=cena = " + zmienna + "<br>");
varzmienna = 4;
zmienna *= 3; //zwróci 12
document.write("zmienna*=3 = " + zmienna + "<br>");
// przypisanie /=
zmienna /= cena;// jest jednoznaczne z: zmienna = zmienna / cena
document.write("zmienna/=cena = " + zmienna + "<br>");
var zmienna = 9;
zmienna /= 3; //zwróci 3 
document.write("zmienna/=3 = " + zmienna + "<br>");
// przypisanie %=
zmienna %= cena;// jest jednoznaczne z: zmienna = zmienna % cena
document.write("zmienna%=cena = " + zmienna + "<br>");
varzmienna = 9;
zmienna %= 2; //zwróci 1
document.write("zmienna%=3 = " + zmienna + "<br>");
// porównanie
var ilosc = prompt("podaj ilość");
var ilosc_1 = prompt("podaj ilość1");
var ilosc_2 = prompt("podaj ilość2");
document.write("ilosc == 30 = " + (ilosc == 30) + "<br>");
document.write("ilosc != 30 = " + (ilosc != 30) + "<br>");
document.write("ilosc > 30 = " + (ilosc > 30) + "<br>");
document.write("ilosc < 30 = " + (ilosc < 30) + "<br>");
document.write("ilosc >= 30 = " + (ilosc >= 30) + "<br>");
document.write("ilosc => 30 = " + (ilosc <= 30) + "<br>");
document.write("ilosc_1 === ilosc_2 = " + (ilosc_1 === ilosc_2) + "<br>");
document.write("ilosc_1 !== ilosc_2  = " + (ilosc_1 !== ilosc_2) + "<br>");
// logiczne
document.write("(ilosc_1>10) && (ilosc_2<10) = " + ((ilosc_1 > 10) && (ilosc_2 < 10)) + "<br>");
document.write("(ilosc_1>10) || (ilosc_2<10) = " + ((ilosc_1 > 10) || (ilosc_2 < 10)) + "<br>");
document.write("!(ilosc==5)  = " + (!(ilosc == 5)) + "<br>");
document.write("(ilosc_1==2) ^ (ilosc_2>2) = " + ((ilosc_1 == 2) ^ (ilosc_2 > 2)) + "<br>");
