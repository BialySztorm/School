function showImg(Ref){
    document.getElementById('show').style.display = "inline-block";
    // alert(Ref.innerHTML)
    document.getElementById('frame').src = Ref;
}
function closeImg(){
    document.getElementById('show').style.display = "none";
}