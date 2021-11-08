const a = document.getElementsByClassName("a")[0],
    b = document.getElementsByClassName("b")[0],
    ans = document.getElementsByClassName("answer")[1],
    avg = document.getElementsByClassName("avg")[0],
    corr = document.getElementsByClassName("corr")[0],
    uncorr = document.getElementsByClassName("uncorr")[0],
    btn = document.getElementsByClassName("turtle")[0],
    ansBanner = document.getElementsByClassName("answer")[0],
    ananasy = document.getElementsByClassName("ananasek")[0],
    liczbaAnanasow = 10
for (i = 0; i < liczbaAnanasow; i++) {
    ananasy.innerHTML +=
        "<img src='img/an.png' alt='ananas" + i + "' class='ananasy'>"
}
const tablicaAnanasow = document.getElementsByClassName("ananasy")
var zdobyteAnanasy = 0
function randNumbers() {
    a.innerHTML = Math.round(Math.random() * 10%9+1)
    b.innerHTML = Math.round(Math.random() * 10%9+1)
}

function check() {
    var tmp1 = parseInt(a.innerHTML),
        tmp2 = parseInt(b.innerHTML)
    if (ans.value == tmp1 * tmp2) {
        corr.innerHTML = parseInt(corr.innerHTML) + 1
        if (!(parseInt(corr.innerHTML) % 5)) {
                tablicaAnanasow[zdobyteAnanasy].src = "img/anok2.png"
                zdobyteAnanasy += 1
        }
    } else {
        uncorr.innerHTML = parseInt(uncorr.innerHTML) + 1
    }
    avg.innerHTML =
        parseInt(
            (parseInt(corr.innerHTML) /
                (parseInt(corr.innerHTML) + parseInt(uncorr.innerHTML))) *
                100
        ) + "%"
    if (liczbaAnanasow == zdobyteAnanasy) {
        alert("Brawo, ukończyłeś to!")
    }
    ans.value = ""
    randNumbers()
}

btn.onclick = check

randNumbers()
