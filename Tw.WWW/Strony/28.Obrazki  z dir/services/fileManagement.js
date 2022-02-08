const fs = require("fs")

getFiles = async (req, res) => {
    try {
        // if (!req.body.json) return res.sendStatus(403)
        var files = fs.readdirSync('C:\\Data\\Projects\\School\\Tw.WWW\\Strony\\28.Pliki\\public\\img');

        res.status(202).send(
            JSON.stringify({
                dir: files
            })
        )
    } catch (err) {
        res.sendStatus(500)
        console.log(err)
    }
}

module.exports = {
    getFiles,
}
