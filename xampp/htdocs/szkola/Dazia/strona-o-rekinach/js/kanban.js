var current = 0,
    board = 0

$("select").change(function () {
    if (current == 0) {
        if (this.value == 1) {
            $("iframe")[0].src = "board_p.php"
            board = 1
        } else {
            $("iframe")[0].src = "board.php"
            board = 0
        }
    } else {
        board = this.value
    }
})
$(".board").click(function () {
    current = 0
    if (board == 0) {
        $("iframe")[0].src = "board.php"
    } else {
        $("iframe")[0].src = "board_p.php"
    }
})
$(".settings").click(function () {
    current = 1
    $("iframe")[0].src = "settings.php"
})
$(".exit").click(function () {
    document.location.href = "logout.php"
})
