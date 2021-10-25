const shibas = document.querySelectorAll(".shibas"),
    output = document.getElementById("shibas"),
    left = document.getElementById("left"),
    right = document.getElementById("right"),
    left1 = document.getElementById("left1"),
    right1 = document.getElementById("right1"),
    shibasLen = 10

function chgOutput(shiba, i) {
    output.src = "grafika/shiba" + i + ".png";
    output.setAttribute('index', i)
}

for (var i = 0; i < shibas.length - 1; i++) {
    shibas[i].onclick = function () {
        chgOutput(this, this.getAttribute('index'))
    }
}

function goLeft() {
    for (i = 0; i < shibas.length - 1; i++) {
        if (shibas[i].getAttribute("index") == 1) {
            shibas[i].src = "grafika/shiba" + shibasLen + ".png"
            shibas[i].setAttribute("index", shibasLen)
        } else {
            shibas[i].src = "grafika/shiba" + (shibas[i].getAttribute("index") - 1) + ".png"
            shibas[i].setAttribute("index", (shibas[i].getAttribute("index") - 1))
        }
    }
}

function goRight() {
    for (i = 0; i < shibas.length - 1; i++) {
        if (shibas[i].getAttribute("index") == shibasLen) {
            shibas[i].src = "grafika/shiba1.png"
            shibas[i].setAttribute("index", 1)
        } else {
            shibas[i].src = "grafika/shiba" + (parseInt(shibas[i].getAttribute("index")) + 1) + ".png"
            shibas[i].setAttribute("index", (parseInt(shibas[i].getAttribute("index")) + 1))
        }
    }
}

function goLeft1() {
    var tmp = output.getAttribute('index')
    if (tmp == 1) {
        chgOutput(shibas[shibasLen], shibasLen);
    } else {
        chgOutput(shibas[tmp - 1], tmp - 1)
    }
}

function goRight1() {
    var tmp = output.getAttribute('index')
    if (tmp == shibasLen) {
        chgOutput(shibas[1], 1)
    } else {
        chgOutput(shibas[parseInt(tmp) + 1], parseInt(tmp) + 1)
    }
}
left.onclick = goLeft
right.onclick = goRight
left1.onclick = goLeft1
right1.onclick = goRight1