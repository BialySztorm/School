/*
 * Variables
 */
const TrueAnswersContainer = $(".container__row--answers")[
        $(".container__row--answers").length - 1
    ],
    Containers = $(".container__row"),
    TrueAnswers = $(".true--answer"),
    Answers = $(".answer"),
    Hints = $(".hint")

var Current = 0
/*
 * Change Color of button
 */
$(".answer").click(function () {
    // one
    if ($(this).attr("color") == "0" || $(this).attr("color") == "6") {
        $(this).css("background-color", "rgb(14, 76, 196)")
        $(this).attr("color", "1")
    }
    // two
    else if ($(this).attr("color") == "1") {
        $(this).css("background-color", "rgb(170, 217, 98)")
        $(this).attr("color", "2")
    }
    // three
    else if ($(this).attr("color") == "2") {
        $(this).css("background-color", "rgb(239, 106, 50)")
        $(this).attr("color", "3")
    }
    // four
    else if ($(this).attr("color") == "3") {
        $(this).css("background-color", "rgb(251, 191, 69)")
        $(this).attr("color", "4")
    }
    // five
    else if ($(this).attr("color") == "4") {
        $(this).css("background-color", "rgb(237, 3, 69)")
        $(this).attr("color", "5")
    }
    // six
    else if ($(this).attr("color") == "5") {
        $(this).css("background-color", "rgb(3, 195, 131)")
        $(this).attr("color", "6")
    }
})
/*
 * Check is set
 */
function isAllSet() {
    for (let i = 0; i < TrueAnswers.length; i++) {
        if (TrueAnswers[i].getAttribute("color") == 0) return false
    }
    return true
}
/*
 * Reset
 */
$(".restart--btn").click(function () {
    TrueAnswersContainer.classList.remove("container__row--hidden")
    Hints.attr("color", "0")
    Answers.attr("color", "0")
    Answers.css("background-color", "")
    Hints.css("background-color", "")
    Containers.css("background-color", "")
    Containers[0].style.backgroundColor = "#313561"
    Current = 0
})
/*
 * Hide or show answers
 */
$(".hNs--btn").click(function () {
    if (isAllSet())
        TrueAnswersContainer.classList.toggle("container__row--hidden")
    else alert("set all colors")
})
/*
 * Check answers
 */
$(".check--btn").click(function () {
    if (isAllSet()) {
        // * Tmp variables
        let Tmp1 = []
        let Tmp2 = []
        let TmpHints = []
        let TmpScore = 0
        // * Set tmp1
        Tmp1.push(TrueAnswers[0].getAttribute("color"))
        Tmp1.push(TrueAnswers[1].getAttribute("color"))
        Tmp1.push(TrueAnswers[2].getAttribute("color"))
        Tmp1.push(TrueAnswers[3].getAttribute("color"))
        // * Set tmp2
        Tmp2.push(Answers[4 * Current].getAttribute("color"))
        Tmp2.push(Answers[4 * Current + 1].getAttribute("color"))
        Tmp2.push(Answers[4 * Current + 2].getAttribute("color"))
        Tmp2.push(Answers[4 * Current + 3].getAttribute("color"))
        // console log for variables
        // console.log(Tmp1)
        // console.log(Tmp2)
        // * Check
        let max = 4
        for (let i = 0; i < max; i++) {
            if (Tmp1[i] == Tmp2[i]) {
                TmpHints.push(1)
                TmpScore+=1
                Tmp1.splice(i, 1)
                Tmp2.splice(i, 1)
                i--
                max--
            }
        }
        for (let i = 0; i < max; i++) {
            for (let j = 0; j < max; j++) {
                if (Tmp1[i] == Tmp2[j]) {
                    TmpHints.push(2)
                    TmpScore+=2
                    Tmp1.splice(i, 1)
                    Tmp2.splice(j, 1)
                    i--
                    max--
                }
            }
        }
        // console log for variables
        // console.log(TmpHints)
        // * Change hints
        for (let i = 0; i < TmpHints.length; i++) {
            if (TmpHints[i] == 1)
                Hints[4 * Current + i].style.backgroundColor = "black"
            else if (TmpHints[i] == 2)
                Hints[4 * Current + i].style.backgroundColor = "white"
        }

        // * Change current end if win
        if(TmpScore==4 && TmpHints.length == 4){
            Containers[Current].style.backgroundColor = ""
            alert("Wygrałeś")
        }
        else if (Current == Containers.length - 2) {
            Containers[Current].style.backgroundColor = ""
            alert("Przegrałeś")
        } else {
            Containers[Current].style.backgroundColor = ""
            Containers[++Current].style.backgroundColor = "#313561"
        }
    } else alert("set all colors")
})
