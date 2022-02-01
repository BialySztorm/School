$(".game--btn").click(function () {
    gameLen = prompt("Podaj liczbę:")
    while (isNaN(gameLen) || gameLen == "") {
        gameLen = prompt("Podaj poprawną liczbę:")
    }
    $(".game--counter")[0].innerHTML = gameLen
})
$(".game__buttons--btn").click(function () {
    var tmp = $(".game--counter")[0]
    if (!isNaN(tmp.innerHTML)) {
        var thisLen = $(this).children().length
        var score = tmp.innerHTML - thisLen
        if (score == 0) {
            tmp.innerHTML = "Koniec"
        } else if (score < 0) {
            alert("błędny wybór")
        } else {
            tmp.innerHTML = score
        }
    }
})
