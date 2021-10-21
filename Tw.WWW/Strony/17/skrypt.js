function changeColor(idname) {
    var red = Math.floor(Math.random() * 256);
    var green = Math.floor(Math.random() * 256);
    var blue = Math.floor(Math.random() * 256); 
    idname.style.background = "rgb(" + red + ", " + green + ", " + blue + ")";
    var red = Math.floor(Math.random() * 256);
    var green = Math.floor(Math.random() * 256);
    var blue = Math.floor(Math.random() * 256); 
    idname.style.boxShadow = "inset 10px 20px 30px rgb(" + red + ", " + green + ", " + blue + ")";
}


function columCount1(kolumny) {
    document.getElementById("wszystko").style.columnCount=kolumny.value;
}

kolumny=document.getElementById("select1");
kolumny.onchange=function(){
    console.log(kolumny);
    columCount1(kolumny);
}

function zmienKolorek() {
    
    var idname = document.getElementById("submit1");
    changeColor(idname);
    idname = document.getElementById("wszystko");
    changeColor(idname);
    idname = document.getElementById("select1");
    changeColor(idname);
    idname = document.getElementById("tytul");
    changeColor(idname);
}      

