function getFileData() {
    const output1 = $(".meter--file")[0]

    $.getJSON("/data/visit.json", function (json) {
        output1.innerHTML = "Odwiedzin wg. pliku: "+(json.visit.length+1)
        // console.log(json.visit.length+1)
    })
        .done(function () {
            console.log("success")
            addFileData(1)
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log("error " + textStatus + "incoming Text " + jqXHR.responseText)
            output1.innerHTML = "Odwiedzin wg. pliku: 1"
            addFileData(0)
        })
}

function getDatabaseData(){
    const output1 = $(".meter--database")[0]
    dataFetch("/count_visitor")
        .then(data=>{
            output1.innerHTML = "Odwiedzin wg. bazy: "+ (data.visitor_count +1)
        })
}