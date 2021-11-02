var currIndex
for(let i = 0; i < $(".container>div").length; i++) {
    if(sessionStorage.getItem('list').split(',')[ i*4 + 2] != 0){
        $(".container>div")[i].onclick = () => {
            sessionStorage.setItem('currIndex', i); 
            currIndex = i;
            $(".pop-up")[0].classList.remove("NVis")
            $(".overflow")[0].classList.remove("NVis")
            $("input").attr("max", sessionStorage.getItem('list').split(',')[i*4 + 2])
        }
    }
}

$("button")[0].onclick = () => {
    let quantity = $(".pop-up input")[0].value
    
    if(sessionStorage.getItem('orderString') != null) {
        var control = {
            repeat: false,
            index: null
        }
        var str = sessionStorage.getItem('orderString')
        var replaceStr = {
            start: "",
            end: ""
        }
        for(var i = 0; i < str.split(";").length - 1; i++) {
            if(str.split(";")[i].split("x")[0] == currIndex)  {
                control.repeat = true
                control.index = i
            } else if (!control.repeat)
                replaceStr.start += str.split(";")[i] + ";"
            else 
                replaceStr.end += str.split(";")[i] + ";"
            
        }

        if(control.repeat) 
            if(quantity == 0)
                sessionStorage.setItem('orderString', replaceStr.start + replaceStr.end)
            else 
                sessionStorage.setItem('orderString', `${replaceStr.start + currIndex}x${quantity};${replaceStr.end}`)
        else if(quantity != 0) 
            sessionStorage.setItem('orderString', `${str + currIndex}x${quantity};`)
        
    } else if(quantity != 0) 
        sessionStorage.setItem('orderString', `${currIndex}x${quantity};`)
    
    closePU()
}

// // // // // // // // // // // // // // // // // // // // // //

$(".cart")[0].onclick = () => {
    location.href = "podstrony\\zamowienia.php"
}

var closePU = () => {
    $(".overflow")[0].classList.add("NVis")
    $(".pop-up")[0].classList.add("NVis")
    $(".pop-up input")[0].value=0;
} 