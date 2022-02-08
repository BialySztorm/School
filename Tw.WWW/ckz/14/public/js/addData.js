function addFileData(state) {
    var id = "_" + Math.random().toString(36).substr(2, 9)
    $.getJSON("https://api.db-ip.com/v2/free/self", function (data) {
        // console.log(JSON.stringify(data, null, 2))
    }).then((data) => {
        if (state) {
            $.getJSON("/data/visit.json", function (json) {
                json.visit.push({
                    id: id,
                    ip: data["ipAddress"],
                    country: data["countryCode"],
                    city: data["city"],
                })
                console.log(dataFetch("/write_file", { json: json }))
            })
        } else {
            $.getJSON("/data/template.json", function (json) {
                json.visit.push({
                    id: id,
                    ip: data["ipAddress"],
                    country: data["countryCode"],
                    city: data["city"],
                })
                console.log(dataFetch("/write_file", { json: json }))
            })
        }
    })
}

function addDatabaseData() {
    $.getJSON("https://api.db-ip.com/v2/free/self", function (data) {
        // console.log(JSON.stringify(data, null, 2))
    }).then((data) => {
        dataFetch("/add_visitor", {
            ip: data["ipAddress"],
            country: data["countryCode"],
            city: data["city"],
        })
    })
}
