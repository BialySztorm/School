const a = document.getElementsByClassName("a")[0],
    b = document.getElementsByClassName("b")[0],
    ans = document.getElementsByClassName("answer1"),
    avg = document.getElementsByClassName("avg")[0],
    corr = document.getElementsByClassName("corr")[0],
    uncorr = document.getElementsByClassName("uncorr")[0],
    btn = document.getElementsByClassName("turtle")[0],
    ansBanner = document.getElementsByClassName("answer")[0]

function shuffle(array) {
    var currentIndex = array.length,
        temporaryValue,
        randomIndex

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex)
        currentIndex -= 1

        // And swap it with the current element.
        temporaryValue = array[currentIndex]
        array[currentIndex] = array[randomIndex]
        array[randomIndex] = temporaryValue
    }

    return array
}

function randNumbers() {
    a.innerHTML = Math.round(((Math.random() * 10) % 9) + 1)
    b.innerHTML = Math.round(((Math.random() * 10) % 9) + 1)
    tmp = []
    tmp.push(a.innerHTML * b.innerHTML)
    for (i = 1; i < ans.length; i++) {
        tmp1 =
            Math.round(((Math.random() * 10) % 9) + 1) *
            Math.round(((Math.random() * 10) % 9) + 1)
        check = 0
        for (j = 0; j < tmp.length; j++) {
            if (tmp1 == tmp[j]) {
                i--
                check = 1
                break
            }
        }
        if (!check) {
            tmp.push(tmp1)
        }
    }
    tmp = shuffle(tmp)
    for (i = 0; i < ans.length; i++) {
        ans[i].innerHTML = tmp[i]
        ans[i].style.display = "inline"
    }
}

for (i = 0; i < ans.length; i++) {
    ans[i].onclick = function () {
        var tmp1 = parseInt(a.innerHTML),
            tmp2 = parseInt(b.innerHTML)
        if (parseInt(this.innerHTML) == tmp1 * tmp2) {
            corr.innerHTML = parseInt(corr.innerHTML) + 1
            ansBanner.classList.remove("uncorrB")
            ansBanner.classList.add("corrB")
            randNumbers()
        } else {
            uncorr.innerHTML = parseInt(uncorr.innerHTML) + 1
            ansBanner.classList.remove("corrB")
            ansBanner.classList.add("uncorrB")
            this.style.display = "none"
        }
        avg.innerHTML =
            parseInt(
                (parseInt(corr.innerHTML) /
                    (parseInt(corr.innerHTML) + parseInt(uncorr.innerHTML))) *
                    100
            ) + "%"
        
    }
}


randNumbers()