$(document).ready(function () {
    $(".nav__add")[0].onclick = function () {
        $(".add").css({ display: "block" })
        $(".title").css({ filter: "blur(2px)" })
        $(".nav").css({ filter: "blur(2px)" })
    }

    $(".nav__search--btn")[0].onclick = function () {
        getData($(".nav__search--txt")[0].value)
    }
    $(".nav__decline")[0].onclick = function () {
        getData("")
    }
    $(".add__block--btn")[0].onclick = function () {
        addData($(".add__block--input")[0].value, $(".add__block--input")[1].value, addFile($(".add__block--input")[2]))
    }

    getData("")
})
