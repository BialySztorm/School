var N = parseInt(prompt("Podaj długość ciągu: "))
var X = parseFloat(prompt("Podaj pierwszy element ciągu: "))
for (var i = 0; i < N; i++) {
    document.write(X + ", ")
    X *= X
}
