const container = $(".container")[0]

$(".buttons__add--start").click((data) => {
    var element = document.createElement("div"),
        count = container.childElementCount
    element.innerHTML = "<div>blok " + count+"</div>"
    element.classList.add("container--block")
    element.classList.add("container--block--"+count)
    container.prepend(element)
    var select = document.createElement("input")
    select.type = "radio"
    select.name = "radioS"
    select.value = count
    element.append(select)

    element.firstChild.onclick = function (){
        element.remove()
    }
})
$(".buttons__add--end").click((data) => {
    var element = document.createElement("div"),
        count = container.childElementCount
    element.innerHTML = "<div>blok " + count+"</div>"
    element.classList.add("container--block")
    element.classList.add("container--block--"+count)
    container.append(element)
    var select = document.createElement("input")
    select.type = "radio"
    select.name = "radioS"
    select.value = count
    element.append(select)
    element.firstChild.onclick = function (){
        element.remove()
    }
})
$(".buttons__add--before").click((data) => {
    var radios = document.getElementsByName("radioS")

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            var element = document.createElement("div"),
                count = container.childElementCount
            element.innerHTML = "<div>blok " + count+"</div>"
            element.classList.add("container--block")
            element.classList.add("container--block--"+count)
            $(".container--block--"+[radios[i].value])[0].before(element)
            var select = document.createElement("input")
            select.type = "radio"
            select.name = "radioS"
            select.value = count
            element.append(select)
            element.firstChild.onclick = function (){
                element.remove()
            }
            break
        }
    }
})
$(".buttons__add--after").click((data) => {
    var radios = document.getElementsByName("radioS")

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            var element = document.createElement("div"),
                count = container.childElementCount
            element.innerHTML = "<div>blok " + count+"</div>"
            element.classList.add("container--block")
            element.classList.add("container--block--"+count)
            $(".container--block--"+[radios[i].value])[0].after(element)
            var select = document.createElement("input")
            select.type = "radio"
            select.name = "radioS"
            select.value = count
            element.append(select)
            element.firstChild.onclick = function (){
                element.remove()
            }
            break
        }
    }
})

$(".buttons__add--before_del").click((data) => {
    if(container.hasChildNodes()){
        container.removeChild(container.firstElementChild)
    }
})

$(".buttons__add--after_del").click((data) => {
    if(container.hasChildNodes()){
        container.removeChild(container.lastElementChild)
    }
})

$(".buttons__add--delete").click((data) => {
    container.innerHTML = ""
})
