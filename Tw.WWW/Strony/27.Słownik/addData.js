function addData(text, lan){
    $.getJSON("dane"+lan+".json", function(json) {
        var good = false
        // console.log(json.words) // this will show the info it in firebug console
        for(var i = 0; i<json.words.length; i++)
        {
            if(json.words[i].word == text.toLowerCase())
            console.log(json.words[i].translate.toString())
                output.value+= (json.words[i].translate.toString())+",\n"
                good = true
        }
    })
}