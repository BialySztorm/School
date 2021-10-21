while (true) {
    a = parseFloat(prompt("Podaj a: "))
    b = parseFloat(prompt("Podaj b: "))
    if (!(a + b))
        alert("Równa się zero")
    else
        break;
}
document.write("Nie równa się zero")