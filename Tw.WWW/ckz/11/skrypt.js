const banner = document.getElementsByClassName("banner")[0],
    bannerText = document.getElementsByClassName("banner__text")[0],
    question = document.getElementsByClassName("question")[0],
    answers = document.getElementsByClassName("answer__content"),
    avg = document.getElementsByClassName("score__content--avg")[0],
    good = document.getElementsByClassName("score__content--good")[0],
    bad = document.getElementsByClassName("score__content--bad")[0]
var curr = [0,0]



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
    curr[0] = Math.round(Math.random() * 11)+1
    curr[1] = Math.round(Math.random() * 11)*5
    if(curr[1]<10)
    question.innerHTML = curr[0]+":0"+curr[1]
    else
        question.innerHTML = curr[0]+":"+curr[1]
    // console.log(curr)
    tmp1 = [curr]
    for (i = 0; i < answers.length - 1; i++) {
        tmp2 = Math.round(Math.random() * 11)+1
        tmp3 = Math.round(Math.random() * 11)*5
        check = 0
        // *Sprawdzanie czy dana liczba nie jest już w tablicy
        for (j = 0; j < tmp1.length; j++) {
            if (tmp2 == tmp1[j][0] && tmp3 == tmp1[j][1]) {
                i--
                check = 1
                break
            }
        }
        // *Jeśli jej nie ma to dodanie do tablicy
        if (!check) {
            tmp1.push([tmp2,tmp3])
        }
    }
    tmp1 = shuffle(tmp1)

    console.log('%cAnswers:','background: red; color: #bada55')
    console.log(tmp1)
    for (i = 0; i < answers.length; i++) {
        answers[i].childNodes[1].style.transform = "rotate("+(30*tmp1[i][0]+30/12*tmp1[i][1]/5)+"deg)"
        answers[i].childNodes[3].style.transform = "rotate("+(30*tmp1[i][1]/5)+"deg)"
        answers[i].setAttribute('hour', tmp1[i][0])
        answers[i].setAttribute('min', tmp1[i][1])
        
    }
}

for (i = 0; i < answers.length; i++) {
    answers[i].onclick = function () {
        if (this.getAttribute("hour") == curr[0] && this.getAttribute('min') == curr[1]) {
            randNum()
            good.innerHTML = parseInt(good.innerHTML) + 1
            banner.classList.remove("banner--bad")
            banner.classList.add("banner--good")
        } else {
            console.log('%cbad!!','background: #222; color: #bada55')
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
