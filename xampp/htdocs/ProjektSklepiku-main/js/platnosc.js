$("h1")[0].innerHTML = `Kwota: ${parseFloat(sessionStorage.getItem("suma")).toFixed(2)}zł`
$("input[name='orderString']")[0].value = sessionStorage.getItem('orderString')
$("input[name='time']")[0].value = sessionStorage.getItem('time')

var old

$("input")[0].onkeydown = () => {
    //Sprawdzić bo Enter usuwa
    // if(/[0-9]/.test(e.target.value))
    if($("input")[0].value < 100000)   old = $("input")[0].value
    else    $("input")[0].value = old 
}

$(".odbiorBtn")[0].onclick = () => {
    window.location.href = "order-end.php"
}