for(let i = 0; i < $("button").length; i++) {
    $("button")[i].onclick = () => {
        $("button")[i].parentElement.style.display = "none";
    }
}