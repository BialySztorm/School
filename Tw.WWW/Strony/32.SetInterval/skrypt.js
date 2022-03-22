var time = 100
function setBg(){
    const x = prompt("set X:"),
        y = prompt("set Y:")
        

    tmp = "<table>"
    for(let i = 0; i<y; i++){
        tmp+="<tr>"
        for(let j = 0; j<x; j++){
            tmp += "<td></td>"
        }
        tmp+="</tr>"
    }
    tmp+="</table>"
    document.querySelector(".background").innerHTML = tmp
    
}
function changeColor(){
    const table = document.getElementsByTagName('tbody')[0],
        tab  = table.childNodes

    for(let i =  0; i< tab.length;  i++){
        tmp = tab[i].childNodes
        for(let j  = 0; j< tmp.length; j++){
            tmp[j].style.backgroundColor = "rgb("+Math.round(Math.random()*255)+","+Math.round(Math.random()*255)+","+Math.round(Math.random()*255)+")"
        }
    }
}
var c;

function start(){
    time = prompt("Podaj czas interwału:")
    clearInterval(c)
    c = setInterval(changeColor, time)
}
function  stop(){
    clearInterval(c)
}


setBg()