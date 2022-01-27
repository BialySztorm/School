dataFetch("/get_files")
    .then(data =>{
        console.log(data.dir)
        document.body.style.backgroundImage = "url('img/"+data.dir[Math.floor(Math.random()*10)]+"')"
    })