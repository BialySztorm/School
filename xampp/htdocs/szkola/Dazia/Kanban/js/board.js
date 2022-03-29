$(".group--add").click(function(){
    $(".prompt--window")[0].classList.add("prompt--window--show")
    $(".hidden--input")[0].value = this.getAttribute("group")
})
$(".task--manage").click(function(){
    $(".prompt--window")[1].classList.add("prompt--window--show")
    $(".hidden--input")[1].value = this.getAttribute("db_id")
    $(".hidden--input")[2].value = this.getAttribute("db_id")
    $(".task--input")[0].value = this.parentElement.getElementsByTagName("span")[0].innerHTML
    $(".color--input")[0].value = this.parentElement.style.backgroundColor
})
$(".hide--add").click(function(){
    $(".prompt--window")[0].classList.remove("prompt--window--show")
})
$(".hide--manage").click(function(){
    $(".prompt--window")[1].classList.remove("prompt--window--show")
    
})


