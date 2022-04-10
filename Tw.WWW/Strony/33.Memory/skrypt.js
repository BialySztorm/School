const timerRef  = $(".controls--text")[0],
    movesRef  = $(".controls--text")[1],
    scoreRef  = $(".controls--text")[2]
var discovered = 0,
    current = ["", ""],
    isOn = false,
    moves = 0,
    timer = null,
    timerM = 0,
    timerS = 0,
    score = 0

function shuffle(array) {
    let currentIndex = array.length,
        randomIndex

    // While there remain elements to shuffle...
    while (currentIndex != 0) {
        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex)
        currentIndex--

        // And swap it with the current element.
        ;[array[currentIndex], array[randomIndex]] = [
            array[randomIndex],
            array[currentIndex],
        ]
    }

    return array
}

function setArray() {
    score = 0
    discovered = 0
    timerM = 0
    timerS = 0
    current = ["", ""]
    isOn = false
    moves = 0
    if(timer!=null){
        clearInterval(timer)
        timer = null
    }
    timerRef.innerHTML = "0min 0s"
    movesRef.innerHTML = "Moves: 0"
    scoreRef.innerHTML = "Score: 0"
    Types = [
        "buffalo",
        "elephant",
        "lion",
        "mouse",
        "penguin",
        "shark",
        "snake",
        "turtle",
    ]
    for(let i =0; i<8; i++)
        $(".card").removeClass("card--"+Types[i])
    Tmp = []
    for (let i = 0; i < 8; i++) {
        Tmp.push(i)
        Tmp.push(i)
    }
    Tmp = shuffle(Tmp)
    for (let i = 0; i < 16; i++) {
        $(".card")[i].classList.add("card--" + Types[Tmp[i]])
        $(".card")[i].classList.add("card--hidden")
        $(".card")[i].setAttribute("card", Tmp[i])
    }
    $(".card").removeClass("card--good")
    $(".card").removeClass("card--bad")
    $(".card").attr("done", 0)
}
function updateTimer(){
    timerS++
    if(timerS >= 60){
        timerS = 0
        timerM++
    }
    timerRef.innerHTML = timerM+"min "+timerS+"s"

}

$(".card").click(function () {
    if ($(this).attr("done")==0) {
        if(timer == null){
            timer = setInterval(updateTimer,1000)
        }
        $(this)[0].classList.remove("card--hidden")
        discovered++
        if (discovered == 1) {
            current[0] = $(this)
            movesRef.innerHTML = "Moves: " + (++moves)
        } else if (discovered == 2) {
            if ((current[0])[0] == $(this)[0]) {
                discovered--
            } else {
                movesRef.innerHTML = "Moves: " + (++moves)
                current[1] = $(this)
                if (current[0].attr("card") == current[1].attr("card")) {
                    current[0].attr("done", 1)
                    current[1].attr("done", 1)
                    current[0].addClass("card--good")
                    current[1].addClass("card--good")
                    scoreRef.innerHTML = "Score: "+ (++score)
                    if(score>=8 && timer!=null){
                        scoreRef.innerHTML = "Score: "+ (score*2/moves*100)
                        clearInterval(timer)
                        timer = null
                    }
                } else {
                    let Tmp = current
                    Tmp[0].addClass("card--bad")
                    Tmp[1].addClass("card--bad")
                    setTimeout(() => {
                        Tmp[0].addClass("card--hidden")
                        Tmp[1].addClass("card--hidden")
                        Tmp[0].removeClass("card--bad")
                        Tmp[1].removeClass("card--bad")
                    }, 300)
                }
                discovered = 0
            }
        }
    }
})
$(".controls--btn").click(setArray)

setArray()

function reportWindowSize() {
    if(window.innerWidth>window.innerHeight){
        $(".card").css("width","18vh")
        $(".card").css("height","18vh")
        $(".container").css("width","calc(4 * 24vh)")
    }
    else{
        $(".card").css("width","18vw")
        $(".card").css("height","18vh")
        $(".container").css("width","calc(4 * 24vw)")

    }
}

window.onresize = reportWindowSize;
reportWindowSize()