const changeLanBtn = $(".language--button")[0],
    translateBtn = $(".translateBtn")[0],
    lanTxt = $(".language--text"),
    input = $(".text--input")[0]

changeLanBtn.onclick = function () {
    if (lanTxt[0].innerHTML == "Polski") {
        lanTxt[0].innerHTML = "Angielski"
        lanTxt[1].innerHTML = "Polski"
        tmp1  = output.value
        tmp2 = input.value
        input.value = tmp1
        output.value = tmp2

    } else {
        lanTxt[0].innerHTML = "Polski"
        lanTxt[1].innerHTML = "Angielski"
        tmp1  = output.value
        tmp2 = input.value
        input.value = tmp1
        output.value = tmp2
    }
}
translateBtn.onclick = function () {
    var tmpText = input.value
    tmpText = tmpText.replace(",", "")
    tmpText = tmpText.replace(".", "")
    tmpText = tmpText.replace("?", "")
    tmpText = tmpText.replace("!", "")
    tmpWord = tmpText.split(" ")
    for (var i = 0; i < tmpWord.length; i++) {
        if (lanTxt[0].innerHTML == "Polski") {
            getData(tmpWord[i], "PL")+",\n"
        } else {
            getData(tmpWord[i], "EN")+",\n"
        }
    }
}
