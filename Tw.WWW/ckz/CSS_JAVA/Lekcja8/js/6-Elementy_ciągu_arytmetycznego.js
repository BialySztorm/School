var a = 5
var b = 0
for (var i = 0; i < 100; i++) {
    if (i != 99)
        document.write(a + " + ")
    else
        document.write(a + " = ")
    b += a
    a += 10
}
document.write(b)