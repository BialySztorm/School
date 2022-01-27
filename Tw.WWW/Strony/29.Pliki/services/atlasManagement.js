const Atlas = require("../db/schemes").Atlas

getAnimals = async (req, res) => {
    try {
        atlas_data = await Atlas.find().lean()

        res.status(202).send(atlas_data)
    } catch (err) {
        res.sendStatus(500)
        console.log(err)
    }
}

searchAnimals = async (req, res) => {
    if (!req.body.name) return res.sendStatus(403)

    try {
        const s = req.body.name
        const regex = new RegExp(s, "i")
        atlas_data = await Atlas.find({name: {$regex: regex}}).lean()

        res.status(202).send(atlas_data)
    } catch (err) {
        res.sendStatus(500)
        console.log(err)
    }
}

addAnimal = async (req, res) => {
    try {
        if (!req.body.name || !req.body.description || !req.body.file)
            return res.sendStatus(400)

        const atlas = new Atlas({
            name: req.body.name,
            description: req.body.description,
            file: req.body.file,
        })
        await atlas.save()

        res.status(202).send(JSON.stringify(atlas))
    } catch (err) {
        res.sendStatus(500)
        console.log(err)
    }
}

module.exports = {
    getAnimals,
    searchAnimals,
    addAnimal,
}
