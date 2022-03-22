const banner = document.getElementsByClassName("banner")[0],
    bannerText = document.getElementsByClassName("banner__text")[0],
    answers = document.getElementsByClassName("answer__content"),
    avg = document.getElementsByClassName("score__content--avg")[0],
    good = document.getElementsByClassName("score__content--good")[0],
    bad = document.getElementsByClassName("score__content--bad")[0]
var min = null,
    correct = []

function randNum() {
    for (i = 0; i < answers.length; i++) {
        answers[i].innerHTML = Math.round(Math.random() * 10)
        for (j = 0; j < i; j++) {
            if (answers[i].innerHTML == answers[j].innerHTML) {
                i--
                break
            }
        }
    }
}

for (i = 0; i < answers.length; i++) {
    answers[i].onclick = function () {
        var parent = this.parentNode
        for (j = 0; j < correct.length; j++) {
            if (
                correct[j] ==
                Array.prototype.indexOf.call(parent.children, this)
            ) {
                return
            }
        }
        tmp = []

        for (j = 0; j < answers.length; j++) {
            tmp1 = true
            for (k = 0; k < correct.length; k++) {
                if (correct[k] == j) {
                    tmp1 = false
                }
            }
            if (tmp1) tmp.push(answers[j].innerHTML)
        }
        min = Math.min.apply(Math, tmp)
        if (this.innerHTML == min) {
            good.innerHTML = parseInt(good.innerHTML) + 1
            banner.classList.remove("banner--bad")
            banner.classList.add("banner--good")
            correct.push(Array.prototype.indexOf.call(parent.children, this))
            this.classList.add("answer__content--correct")
            if (correct.length >= 4) {
                correct = []
                for(j = 0; j<answers.length; j++){
                    answers[j].classList.remove("answer__content--correct")
                }
                randNum()
            }
        } else {
            console.log("%cbad!!", "background: #222; color: #bada55")
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
