const container = $(".container")[0]

$(".buttons__add--start").click((data) => {
    var element = document.createElement("div"),
        count = container.childElementCount
    element.innerHTML = "blok " + count
    element.classList.add("container--block")
    element.classList.add("container--block--"+count)
    container.prepend(element)
    var select = document.createElement("input")
    select.type = "radio"
    select.name = "radioS"
    select.value = count
    element.append(select)
})
$(".buttons__add--end").click((data) => {
    var element = document.createElement("div"),
        count = container.childElementCount
    element.innerHTML = "blok " + count
    element.classList.add("container--block")
    element.classList.add("container--block--"+count)
    container.append(element)
    var select = document.createElement("input")
    select.type = "radio"
    select.name = "radioS"
    select.value = count
    element.append(select)
})
$(".buttons__add--before").click((data) => {
    var radios = document.getElementsByName("radioS")

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            var element = document.createElement("div"),
                count = container.childElementCount
            element.innerHTML = "blok " + count
            element.classList.add("container--block")
            element.classList.add("container--block--"+count)
            $(".container--block--"+[radios[i].value])[0].before(element)
            var select = document.createElement("input")
            select.type = "radio"
            select.name = "radioS"
            select.value = count
            element.append(select)
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
            element.innerHTML = "blok " + count
            element.classList.add("container--block")
            element.classList.add("container--block--"+count)
            $(".container--block--"+[radios[i].value])[0].after(element)
            var select = document.createElement("input")
            select.type = "radio"
            select.name = "radioS"
            select.value = count
            element.append(select)
            break
        }
    }
})
$(".buttons__add--delete").click((data) => {
    container.innerHTML = ""
})
