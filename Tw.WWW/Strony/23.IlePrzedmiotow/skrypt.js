const banner = document.getElementsByClassName("banner")[0],
    bannerText = document.getElementsByClassName("banner__text")[0],
    question = document.getElementsByClassName("question")[0],
    answers = document.getElementsByClassName("answer__content"),
    avg = document.getElementsByClassName("score__content--avg")[0],
    good = document.getElementsByClassName("score__content--good")[0],
    bad = document.getElementsByClassName("score__content--bad")[0]
var curr = 0

// *przemieszanie tablicy
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

function randNum() {
    curr = Math.round(Math.random() * 8+1)
    tmpTxt = ""
    tmpImg = Math.round(Math.random() * 4 + 1)
    console.log(tmpImg)
    for(i = 0; i<curr; i++){
        tmpTxt += "<img class='question__content' src='img/item"+tmpImg+".png'>"
    }

    question.innerHTML = tmpTxt
    tmp1 = [curr]
    for (i = 0; i < answers.length - 1; i++) {
        tmp2 = Math.round(Math.random() * 8+1)
        check = 0
        // *Sprawdzanie czy dana liczba nie jest już w tablicy
        for (j = 0; j < tmp1.length; j++) {
            if (tmp2 == tmp1[j]) {
                i--
                check = 1
                break
            }
        }
        // *Jeśli jej nie ma to dodanie do tablicy
        if (!check) {
            tmp1.push(tmp2)
        }
    }
    tmp1 = shuffle(tmp1)
    for (i = 0; i < answers.length; i++) {
        answers[i].innerHTML = tmp1[i]
    }
}

for (i = 0; i < answers.length; i++) {
    answers[i].onclick = function () {
        if (this.innerHTML == curr) {
            randNum()
            good.innerHTML = parseInt(good.innerHTML) + 1
            banner.classList.remove("banner--bad")
            banner.classList.add("banner--good")
        } else {
            console.log("bad!!")
            bad.innerHTML = parseInt(bad.innerHTML) + 1
            banner.classList.remove("banner--good")
            banner.classList.add("banner--bad")
        }
        avg.innerHTML =
            Math.round(
                (parseFloat(good.innerHTML) /
                    (parseFloat(good.innerHTML) + parseFloat(bad.innerHTML))) *
                    100
            ) + "%"
    }
}

randNum()
