var str = sessionStorage.getItem('orderString')
let sum = 0

if(str && str != "") {
    loadOrders()

    $("button")[1].onclick = () => {
        sessionStorage.setItem("time", $(".time-in")[0].value.split(" ")[0])
        sessionStorage.setItem("suma", sum)
        location.href = "platnosc.php"
    }
}



function loadOrders() {
    for(var i = 0; i < str.split(";").length - 1; i++) {
        let cena = parseFloat(sessionStorage.getItem('list').split(',')[ parseInt(str.split(";")[i].split("x")[0])*4 + 1])
        let ilosc = parseInt(str.split(";")[i].split("x")[1])
    
        sum +=cena*ilosc
    
        let wholeStr = `<div><h3>${sessionStorage.getItem('list').split(',')[ parseInt(str.split(";")[i].split("x")[0])*4 ]}</h3>`
        wholeStr += `<div class="ilosc-container"><input type="number" value="${ilosc}" min="0" max="${sessionStorage.getItem('list').split(',')[ parseInt(str.split(";")[i].split("x")[0])*4 +2 ]}"><p> x ${cena.toFixed(2)}zł</p></div>`
        wholeStr += `<h2>${(ilosc * cena).toFixed(2)}zł</h2>`
        wholeStr += `<div class="delete"></div></div>`
        $(".orders-container")[0].innerHTML += wholeStr
    }
    $(".orders-container")[0].innerHTML += `<div class="suma">Łącznie: ${sum.toFixed(2)}zł</div>`

    for(let i = 0; i < $(".orders-container input").length; i++) {
        // Przypisanie funkcji do przeliczenia zapłaty
        $(".orders-container input")[i].onchange = () => {
            var ceny = str.split(";"),
            value = parseInt($(".orders-container input").eq(i)[0].value)

            if(value != 0) {
                ceny[i] = ceny[i].split("x")[0] +"x"+ $(".orders-container input").eq(i)[0].value
                $(".orders-container h2")[i].innerHTML = parseFloat($(".orders-container input").eq(i)[0].value * sessionStorage.getItem('list').split(',')[ parseInt(str.split(";")[i].split("x")[0])*4 + 1] + "zł").toFixed(2)
            } else {
                console.log("brrryt")
                ceny.splice(i, 1)
            }
            
            str = ceny.join(";")
            sessionStorage.setItem('orderString', str)

            sum = 0
            for(let j = 0; j < str.split(";").length - 1; j++) {
                let cena = sessionStorage.getItem('list').split(',')[ parseInt(str.split(";")[j].split("x")[0])*4 + 1]
                let ilosc = parseInt(str.split(";")[j].split("x")[1])
    
                sum +=cena*ilosc
            }
            $(".suma")[0].innerHTML = `Łącznie: ${sum.toFixed(2)}zł`
        }

        // Usuwanie przedmiotów
        $(".delete")[i].onclick = () => {
            var ceny = str.split(";")
            ceny.splice(i, 1)
            str = ceny.join(";")

            sessionStorage.setItem('orderString', str)

            $(".orders-container")[0].innerHTML = ""
            sum = 0
            loadOrders()
        }
    }
}

$("button")[0].onclick = () => {
    location.href = "..\\menu.php"
}
