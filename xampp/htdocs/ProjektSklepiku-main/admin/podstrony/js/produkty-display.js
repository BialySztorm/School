var str = ""

for(let i = 0; i < $(".container>div").length; i++) {
    $('input[name="cena"]')[i].onchange = change(i)
    $('input[name="ilosc"]')[i].onchange = change(i)
}

    // index    x   cena    x   ilosc
var change = index => {
    
    // $(".orders-container input")[i].onchange = () => {
    //     var ceny = str.split(";"),
    //     value = parseInt($(".orders-container input").eq(i)[0].value)

    //     if(value != 0) {
    //         ceny[i] = ceny[i].split("x")[0] +"x"+ $(".orders-container input").eq(i)[0].value
    //         $(".orders-container h2")[i].innerHTML = parseFloat($(".orders-container input").eq(i)[0].value * sessionStorage.getItem('list').split(',')[ parseInt(str.split(";")[i].split("x")[0])*4 + 1] + "zł").toFixed(2)
    //     } else {
    //         console.log("brrryt")
    //         ceny.splice(i, 1)
    //     }
        
    //     str = ceny.join(";")
    //     sessionStorage.setItem('orderString', str)

    //     sum = 0
    //     for(let j = 0; j < str.split(";").length - 1; j++) {
    //         let cena = sessionStorage.getItem('list').split(',')[ parseInt(str.split(";")[j].split("x")[0])*4 + 1]
    //         let ilosc = parseInt(str.split(";")[j].split("x")[1])

    //         sum +=cena*ilosc
    //     }
    //     $(".suma")[0].innerHTML = `Łącznie: ${sum.toFixed(2)}zł`
    // }




    str += `${index}x${$('input[name="cena"]')[index].value}x${$('input[name="ilosc"]')[index].value};`
    console.log(str)
}