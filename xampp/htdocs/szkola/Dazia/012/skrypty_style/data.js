var dateRef = document.getElementsByClassName("data");
var redRef = document.getElementsByClassName("red");
var d = new Date();
for (var i = 0; i < dateRef.length; i++) {
    var year = dateRef[i].innerHTML.substr(0, 4);
    var month = parseInt(dateRef[i].innerHTML.substr(5, 2));
    var day = parseInt(dateRef[i].innerHTML.substr(8, 2));
    if (year < d.getFullYear())
        redRef[i].style.color = "#e4002e";
    else if (year <= d.getFullYear() && month < d.getMonth() + 1)
        redRef[i].style.color = "#e4002e";
    else if (year <= d.getFullYear() && month <= d.getMonth() + 1 && day < d.getDate())
        redRef[i].style.color = "#e4002e";
}