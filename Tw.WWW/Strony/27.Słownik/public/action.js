const changeLanBtn = $(".language--button"),
    translateBtn = $(".translateBtn")[0],
    lanTxt = $(".language--text"),
    input = $(".text--input"),
    menu = $(".menu")[0],
    hamburger = $(".hamburger")[0],
    addBtn = $(".addTranslate")[0],
    addInputBtn = $(".addInput")[0],
    inputs = $(".menu__inputs")[0]
var output = $(".text--output")

var hamburgerRotate = 0
function changeLan(i) {
    if (lanTxt[i * 2].innerHTML == "Polski") {
        lanTxt[i * 2].innerHTML = "Angielski"
        lanTxt[i * 2 + 1].innerHTML = "Polski"
        if (i == 0) {
            tmp1 = output[0].value
            tmp2 = input[0].value
            input[0].value = tmp1
            output[0].value = tmp2
        }
    } else {
        lanTxt[i * 2].innerHTML = "Polski"
        lanTxt[i * 2 + 1].innerHTML = "Angielski"
        if (i == 0) {
            tmp1 = output[0].value
            tmp2 = input[0].value
            input[0].value = tmp1
            output[0].value = tmp2
        }
    }
}

changeLanBtn[0].onclick = function () {
    changeLan(0)
}
changeLanBtn[1].onclick = function () {
    changeLan(1)
}

translateBtn.onclick = function () {
    var tmpText = input[0].value
    tmpText = tmpText.replace(",", "")
    tmpText = tmpText.replace(".", "")
    tmpText = tmpText.replace("?", "")
    tmpText = tmpText.replace("!", "")
    tmpText = tmpText.replace('"', "")
    tmpWord = tmpText.split(" ")
    output[0].value = ""
    for (var i = 0; i < tmpWord.length; i++) {
        if (lanTxt[0].innerHTML == "Polski") {
            getData(tmpWord[i], "PL") + ",\n"
        } else {
            getData(tmpWord[i], "EN") + ",\n"
        }
    }
}

hamburger.onclick = function () {
    if (hamburgerRotate == 0) {
        hamburger.firstChild.style.transform =
            "translate(-50%, -50%) rotateZ(180deg)"
        menu.style.right = "0vw"
        hamburgerRotate = 1
    } else {
        hamburger.firstChild.style.transform =
            "translate(-50%, -50%) rotateZ(0deg)"
        menu.style.right = "-40vw"
        hamburgerRotate = 0
    }
}

addInputBtn.onclick = function () {
    var newInput = document.createElement("input")
    newInput.type = "text"
    newInput.placeholder = "Wpisz tłumaczenie"
    newInput.classList.add("text--output")
    inputs.appendChild(newInput)
    output = $(".text--output")
}

addBtn.onclick = function () {
    tmp1 = input[1].value
    tmp2 = []
    for (i = 1; i < output.length; i++) {
        if (output[i].value == "") {
            alert("Nie wpisano nic")
            break
        }
        tmp2.push(output[i].value)
        output[i].value = ""
    }
    input[1].value = ""
    if (lanTxt[2].innerHTML == "Polski") {
        addData("PL", tmp1, tmp2)
    } else {
        addData("EN", tmp1, tmp2)
    }
}
