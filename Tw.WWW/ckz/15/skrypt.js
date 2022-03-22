var players = [],
    playersCount,
    current = 0


$(".game--btn").click(function () {
    players = []
    playersCount = prompt("Podaj liczbę graczy (Domyślnie 2)")
    if(playersCount<2){
        playersCount =2
    }
    while (isNaN(playersCount)) {
        playersCount = prompt("Podaj poprawną liczbę:")
    }
    for(var i = 0; i< playersCount; i++) players.push(prompt("Gracz nr "+(i+1)+":"))

    gameLen = prompt("Podaj liczbę:")
    while (isNaN(gameLen) || gameLen == "") {
        gameLen = prompt("Podaj poprawną liczbę:")
    }
    
    $(".game__counter")[0] = ""
    for(var i = 0; i< gameLen; i++){
        let div = document.createElement("div")
        div.classList.add("game__counter--element")
        $(".game__counter")[0].append(div)
    }
    
    $(".game__counter")[1].innerHTML = "Tura: "+players[0]
})

$(".game__buttons--btn").click(function () {
    var tmp = $(".game__counter")[0]
    var tmp1 = $(".game__counter")[1]

    if (tmp.childElementCount>0) {
        var thisLen = $(this)[0].childElementCount
        var score = tmp.childElementCount - thisLen
        if (score == 0) {
            console.log(score)
            tmp.innerHTML = ""
            tmp1.innerHTML = "Koniec<br>Przegrał/a:"+players[current]
        } else if (score < 0) {
            console.log(score)
            alert("błędny wybór")
        } else {
            console.log(score)
            for(var i = 0; i<thisLen;  i++){
                tmp.removeChild(tmp.firstChild);
            }
            tmp1.innerHTML = "Tura: "+players[(current+1<players.length)? ++current: current=0]
        }
    }
})
