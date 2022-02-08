const fs = require("fs")

writeFile = async (req, res) => {
    try {
        if (!req.body.json) return res.sendStatus(403)

        fs.writeFile(
            "./public/data/visit.json",
            JSON.stringify(req.body.json),
            "utf8",
            (err) => {
                // In case of a error throw err.
                if (err) throw err
            }
        )
    } catch (err) {
        res.sendStatus(500)
        console.log(err)
    }
}

module.exports = {
    writeFile,
}
