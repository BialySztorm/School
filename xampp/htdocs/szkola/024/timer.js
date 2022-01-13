const timer = document.getElementsByClassName('timer')
var countDownDate = new Date().getTime() +(1000*300)

var myfunc = setInterval(function(){
    var now = new Date().getTime()
    var timeleft = countDownDate - now
        
    // Calculating the days, hours, minutes and seconds left
    var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60))
    var seconds = Math.floor((timeleft % (1000 * 60)) / 1000)
        
    // Result is output to the specific element
    timer[0].innerHTML = minutes + "m " 
    timer[1].innerHTML = seconds + "s " 
        
    // Display the message when countdown is over
    if (timeleft < 0) {
        clearInterval(myfunc);
        timer[0].innerHTML = ""
        timer[1].innerHTML = ""
        timer[2].innerHTML = "TIME UP!!"
        document.location = "end.php"
    }
},1000)