var wynik1 = 0
function wypisz(b) {
    // alert("wypisz()")
    if (wynik1 == 1) {
        document.getElementById("textarea1").value = ""
        wynik1 = 0
    }
    var a = document.getElementById("textarea1").value
    // alert(b)
    if (a[(a.length) - 1] == " " && b[0] == " ")
        a = a.substr(0, a.length - 3)
    if (b == "C")
        document.getElementById("textarea1").value = ("")
    else if (b == "del")
        if (a[(a.length) - 1] == " ")
            document.getElementById("textarea1").value = (a.substr(0, a.length - 3))
        else
            document.getElementById("textarea1").value = (a.substr(0, a.length - 1))
    else
        document.getElementById("textarea1").value = (a + b)
}

function dziel(tab, i) {
    var wynik = 0
    for (var j = 0; j < tab.length; j++) {
        if (j == i - 1)
            wynik += parseFloat(tab[j])
        else if (j == i + 1) {
            wynik /= parseFloat(tab[j])
            tab[i - 1] = wynik
        }
        else if (j > i + 1)
            tab[j - 2] = tab[j]
    }
    tab.pop()
    tab.pop()
    i -= 2
}

function mnoz(tab, i) {
    var wynik = 0
    for (var j = 0; j < tab.length; j++) {
        if (j == i - 1)
            wynik += parseFloat(tab[j])
        else if (j == i + 1) {
            wynik *= parseFloat(tab[j])
            tab[i - 1] = wynik
        }
        else if (j > i + 1)
            tab[j - 2] = tab[j]
    }
    tab.pop()
    tab.pop()
    i -= 2
}

function dodaj(tab, i) {
    var wynik = 0
    for (var j = 0; j < tab.length; j++) {
        if (j == i - 1)
            wynik += parseFloat(tab[j])
        else if (j == i + 1) {
            wynik += parseFloat(tab[j])
            tab[i - 1] = wynik
        }
        else if (j > i + 1)
            tab[j - 2] = tab[j]
    }
    tab.pop()
    tab.pop()
    i -= 2
}

function odejmij(tab, i) {
    var wynik = 0
    for (var j = 0; j < tab.length; j++) {
        if (j == i - 1)
            wynik += parseFloat(tab[j])
        else if (j == i + 1) {
            wynik -= parseFloat(tab[j])
            tab[i - 1] = wynik
        }
        else if (j > i + 1)
            tab[j - 2] = tab[j]
    }
    tab.pop()
    tab.pop()
    i -= 2
}

function wynik() {
    wynik1 = 1
    var a = document.getElementById("textarea1").value
    var b = a.split(" ")
    if (b[b.length - 1] == "") {
        a = a.substr(0, a.length - 3)
        b.pop()
        b.pop()
    }

    var i = 0
    while (i < b.length) {
        if (b[i] == "*")
            mnoz(b, i)
        else if (b[i] == "/")
            dziel(b, i)
        else
            i++
    }
    i = 0
    while (i < b.length) {
        if (b[i] == "+")
            dodaj(b, i)
        else if (b[i] == "-")
            odejmij(b, i)
        else
            i++
    }
    document.getElementById("textarea1").value = (a + " = \n" + b)
}