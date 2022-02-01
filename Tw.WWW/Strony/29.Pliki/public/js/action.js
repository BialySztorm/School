$(document).ready(function () {
    $(".nav__add")[0].onclick = function () {
        $(".add").css({ display: "block" , animation: "showBlock 1s 1"})
        $(".title").css({ filter: "blur(2px)" })
        $(".nav").css({ filter: "blur(2px)" })
        $(".atlas").css({ filter: "blur(2px)" })
    }
    $(".add__remove")[0].onclick = function () {
        $(".add").css({ animation: "hideBlock 0.5s 1"})
        setTimeout(
            function() 
            {
                $(".add").css({ display: "none"})
                $(".title").css({ filter: "" })
                $(".nav").css({ filter: "" })
                $(".atlas").css({ filter: "" })
            }, 480)
    }

    $(".nav__search--btn")[0].onclick = function () {
        getData($(".nav__search--txt")[0].value)
    }
    $(".add__block--btn")[0].onclick = function () {
        addData($(".add__block--input")[0].value, $(".add__block--input")[1].value, addFile($(".add__block--input")[2]))
        $(".add__block--input")[0].value = ""
        $(".add__block--input")[1].value = ""
        $(".add__block--input")[2].files[0] = ""
        $(".add__block--input")[2].value = ""
        getData("")
    }

    getData("")
})
