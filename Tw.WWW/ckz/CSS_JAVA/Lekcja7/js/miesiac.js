var miesiace = ["Źle wprowadzone dane","Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień"]
var wpisanie = 0
for(var i = 0; i<3;i++){
    a = prompt("Podaj numer miesiąca: ")
    if(a>0&&a<13){
        wpisanie = a
        break
    }
}
document.write("Wybrałeś: "+miesiace[wpisanie])