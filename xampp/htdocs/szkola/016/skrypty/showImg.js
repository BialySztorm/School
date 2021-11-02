showRef = document.getElementById('show');
frameRef = document.getElementById('frame');

function showImg(Ref){
    showRef.style.display = "inline-block";
    // alert(Ref.innerHTML)
    frameRef.src = Ref.innerHTML;
}
function closeImg(){
    showRef.style.display = "none";
}