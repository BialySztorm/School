var suma = 0
function random(min, max) {
    var tmp = min + (max - min) * Math.random();
    tmp = Math.round(tmp)
    return tmp
}
for (var i = 0; i < 10; i++) {
    var tmp = random(50, 100)
    suma += tmp
    document.write(tmp + ", ")
}
document.write("<br>Suma: " + suma)
document.write("<br>Średnia: " + (suma / 10))