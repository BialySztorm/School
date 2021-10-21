for (var i = 0; i <10; i++) {
    for (var j = 0; j <9; j++) {
        if(j!=5)
            document.write("*")
        else
            document.write(" ")
    }
    document.write("<br>")
}

document.write("<br><br>")
for(var i = 0; i<8;i++)
{
    for(var j = 0; j<=i; j++)
        document.write("*")
    document.write("<br>")
}
document.write("<br><br>")
for(var i = 8; i>0;i--)
{
    for(var j = i; j>0; j--)
        document.write("*")
    document.write("<br>")
}