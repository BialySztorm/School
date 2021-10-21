var N = parseInt(prompt("Podaj długość ciągu: "))
var X = parseInt(prompt("Podaj pierwszy element ciągu: "))
var Y = parseInt(prompt("Podaj różnicę pomiędzy kolejnymi elementami ciągu: "))
for (var i = 0; i < N; i++) {
    document.write(X + ", ")
    X += Y
}