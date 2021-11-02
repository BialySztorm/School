var visible = false
$(".hamburger")[0].onclick = () => {
    visible = !visible
    if(visible) $(".nawigacja")[0].classList.add("nawigacja1")
    else $(".nawigacja")[0].classList.remove("nawigacja1")
    if(visible) $(".hamburger")[0].classList.add("hamburger1")
    else $(".hamburger")[0].classList.remove("hamburger1")
    
}