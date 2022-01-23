function addData(lan, word, text) {
    if (word != "") {
        console.log(lan + ", " + word + ", " + text.toString())
        $.getJSON("dane" + lan + ".json", function (json) {
            var good = false
            console.log(json) // this will show the info it in firebug console
            for (var i = 0; i < json.words.length; i++) {
                if (json.words[i].word == word.toLowerCase()) {
                    console.log(json.words[i].translate.toString())
                    json.words[i].translate =
                        json.words[i].translate.concat(text)
                    good = true
                }
            }
            if (!good) {
                json.words.push({ word: word, translate: text })
            }
            dataFetch("/write_file", { lan: lan, json: json })
        })
    }
}
