function getData(search) {
    const output = $(".atlas")[0]
    output.innerHTML = ""
    if (search == "") {
        dataFetch("/get_animals").then((data) => {
            data.forEach((row) => {
                output.innerHTML +=
                    "<div class='atlas__container'><div class='atlas__container--animal'><img src='" +
                    row.file +
                    "'>" +
                    row.name +
                    "</div><div class='atlas__container--description'>" +
                    row.description +
                    "</div></div>"
            })
        })
    } else {
        dataFetch("/search_animals", { name: search }).then((data) => {
            data.forEach((row) => {
                output.innerHTML +=
                    "<div class='atlas__container'><div class='atlas__container--animal'><img src='" +
                    row.file +
                    "'>" +
                    row.name +
                    "</div><div class='atlas__container--description'>" +
                    row.description +
                    "</div></div>"
            })
        })
    }
}

function addData(name, description, file) {
    dataFetch("/add_animal", {
        name: name,
        description: description,
        file: file,
    })
}

function addFile(file) {
    sendFile({file:file})
    return "/img/uploaded/"+file.value.replace(/.*[\/\\]/, '')
}
