var files = new Array()
// Dokładanie plików
files.push("1-Wyświetlanie_10_liczb_rosnąco.html")
files.push("2-Wyświetlanie_10_liczb_malejąco.html")
files.push("3-Suma_kolejmych_liczb_całkowitych.html")
files.push("4-Wyświetlanie_10_liczb_parzystych.html")
files.push("5-Odliczanie_odsetek.html")
files.push("6-Elementy_ciągu_arytmetycznego.html")
files.push("7-Ilość_cegieł_w_piramidzie.html")
files.push("8-Ilość_cegieł_w_ścianie.html")
files.push("9-Waga_ściany.html")
files.push("10-Kalkulator.html")
files.push("11-Elementy_n-tego_ciągu_arytmetycznego.html")
files.push("12-Suma_inna_niż_zero.html")
files.push("13-Silnia.html")
files.push("14-Ciąg_kwadratowy_liczb.html")
files.push("15-Suma_i_średnia.html")
// files.push("")
// Koniec Dokładania plików
var files1 = new Array()

for (var i = 0; i<files.length;i++)
{
    var tmp = files[i]
    tmp = tmp.replace("-",". ")
    tmp = tmp.replace(/_/gi," ")
    tmp = tmp.replace(".html","")
    files1.push(tmp)
}
for (var i = 0; i<files.length;i++)
{
    document.write('<div><a href="podstrony/'+files[i]+'">'+files1[i]+'</a></div>')
}