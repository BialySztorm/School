// dectoox
function dectoox(a) {
    a = parseInt(a)
    var a1 = "";
    var x = a;
    var i = 0;
    while (x/a>1) {
        x/=a
        i++;
    }
    while (i>0) {
        var tmp = 1
        for(var j = 0; j<i; j++)
            tmp*=i;
        if ((a / tmp)>0)
            a1 += a/tmp;
        else
            a1 += a;
        a %= tmp;
        i--;
    }
    return a1;
}

// oxtodec
function oxtodec(a) {

}

// dectohex
function dectohex(a) {

}

// hextodec
function hextodec(a) {

}

// dectobinzm
function dectobinzm(a) {

}

// binzmtodec
function binzmtodec(a) {

}

// wybór zamiany
function change() {
    var option = parseInt(document.getElementById('task').value);
    var typeIn = document.getElementById('typeIn').value;
    var typeOut = "";
    switch (option) {
        case 1:
            typeOut = dectoox(typeIn);
            break;
        case 2:
            typeOut = oxtodec(typeIn);
            break;
        case 3:
            typeOut = dectohex(typeIn);
            break;
        case 4:
            typeOut = hextodec(typeIn);
            break;
        case 5:
            typeOut = dectobinzm(typeIn);
            break;
        case 6:
            typeOut = binzmtodec(typeIn);
            break;
    }
    document.getElementById('typeOut').value = typeOut;
} 