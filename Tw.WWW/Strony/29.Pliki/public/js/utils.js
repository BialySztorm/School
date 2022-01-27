dataFetch = (url, data={}, method="POST") => {
    return fetch(url, {
        method: method,
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    }).then(res => {
        // if status code is 400~, 500~ throw error with the status number
        if(!res.ok)     throw res.status
        return res.json()        
    })
}


sendFile =  (data={}) => {
    const formData = new FormData()
    formData.append("img", data.file.files[0])

    fetch("/upload_img", { 
        method: "POST",
        body: formData
    })
}