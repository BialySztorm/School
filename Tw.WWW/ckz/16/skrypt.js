function decToNum(dec, system) {
    dec = String(dec)
    system = parseInt(system)
    if (dec.indexOf(".") != -1) dec = dec.split(".")
    else if (dec.indexOf(",") != -1) dec = dec.split(",")
    else dec = [dec]
    num0 = ""
    num1 = ""
    num2 = ""
    if (dec[0][0] == "-") {
        num0 = "-"
        dec[0] = dec[0].substr(1)
    }
    if (dec[0] == "" || dec[0] == "0") num1 = "0"
    if (dec.length == 1) {
        num2 = "0"
    } else if (dec[1] == "0") num2 = "0"

    while (dec[0] > 0) {
        var rest = dec[0] % system
        if (system > 10 && rest > 9) {
            rest = String.fromCharCode(rest + 55)
        }
        num1 = String(rest) + num1
        dec[0] = Math.floor(dec[0] / system)
    }
    if (dec.length > 1) {
        i = 1
        dec[1] = parseFloat("0." + dec[1])
        while (dec[1] > 0) {
            score = Math.floor(dec[1] / (1 / Math.pow(system, i)))
            if (score >= 1) {
                if (score > 9) {
                    score = String.fromCharCode(score + 55)
                }
                num2 += score
                dec[1] -= score * (1 / Math.pow(system, i))
            } else {
                num2 += 0
            }
            i++
        }
    }
    num2 = num2.substr(0, 8)

    return num0 + num1 + "." + num2
}

function numToDec(num, system) {
    num = String(num)
    num = num.toUpperCase()
    system = parseInt(system)
    if (num.indexOf(".") != -1) num = num.split(".")
    else if (num.indexOf(",") != -1) num = num.split(",")
    else num = [num]

    dec0 = ""
    dec = 0
    if (num[0][0] == "-") {
        dec0 = "-"
        num[0] = num[0].substr(1)
    }

    for (i = 0; i < num[0].length; i++) {
        if (!isNaN(num[0][i])) {
            dec +=
                parseFloat(num[0][i]) * Math.pow(system, num[0].length - 1 - i)
        } else {
            dec += parseFloat(
                (num[0][i].charCodeAt(0) - 55) *
                    Math.pow(system, num[0].length - 1 - i)
            )
        }
    }
    if (num.length > 1) {
        for (i = 0; i < num[1].length; i++) {
            if (num[1][i] == 0) continue
            if (!isNaN(num[1][i])) {
                dec += (1 / Math.pow(system, i + 1)) * parseFloat(num[1][i])
            } else {
                dec +=
                    (1 / Math.pow(system, i + 1)) *
                    (parseFloat(num[1][i].charCodeAt(0)) - 55)
            }
        }
    }

    return dec0 + dec
}

$(".converter--submit").click((data) => {
    if (
        $(".converter--input")[0].value != "" &&
        $(".converter--input")[1].value != ""
    ) {
        tmp = 0
        tmp1 = parseFloat(
            numToDec(
                $(".converter--input")[0].value,
                $(".converter--option")[0].value
            )
        )
        tmp2 = parseFloat(
            numToDec(
                $(".converter--input")[1].value,
                $(".converter--option")[1].value
            )
        )
        if ($(".converter--operation")[0].value == 1) {
            tmp = tmp1 + tmp2
        } else if ($(".converter--operation")[0].value == 2) {
            tmp = tmp1 - tmp2
        } else if ($(".converter--operation")[0].value == 3) {
            tmp = tmp1 * tmp2
        } else if ($(".converter--operation")[0].value == 4) {
            tmp = tmp1 / tmp2
        }
        $(".converter--output")[0].value = decToNum(
            tmp,
            $(".converter--option")[2].value
        )
        console.log(tmp)
    } else if (
        $(".converter--input")[0].value != "" ||
        $(".converter--input")[1].value != ""
    ) {
        tmp = 0
        if ($(".converter--input")[0].value != "") {
            tmp = numToDec(
                $(".converter--input")[0].value,
                $(".converter--option")[0].value
            )
        } else {
            tmp = numToDec(
                $(".converter--input")[1].value,
                $(".converter--option")[1].value
            )
        }
        $(".converter--output")[0].value = decToNum(
            tmp,
            $(".converter--option")[2].value
        )
        console.log(tmp)
    } else {
        console.log("brak liczb")
    }
})

$(".converter--option").change((data) => {
    if (
        data.target.value > 10 &&
        $(".converter--input")[
            data.target.getAttribute("line") - 1
        ].getAttribute("type") == "number"
    ) {
        $(".converter--input")[
            data.target.getAttribute("line") - 1
        ].setAttribute("type", "text")
    } else if (
        data.target.value <= 10 &&
        $(".converter--input")[
            data.target.getAttribute("line") - 1
        ].getAttribute("type") == "text"
    ) {
        $(".converter--input")[
            data.target.getAttribute("line") - 1
        ].setAttribute("type", "number")
    }
    // console.log($(".converter--input")[data.target.getAttribute( "line" )-1])
})

// console.log(String.fromCharCode(65))
