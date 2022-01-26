const Visitor = require('../db/schemes').Visitor

countVisitor = async (req, res) => {
    // if(!req.body.city)      return  res.sendStatus(403)

    try {
        res.status(202).send(JSON.stringify({
            visitor_count: await Visitor.countDocuments()
        }))
    } catch(err) {
        res.sendStatus(500)
        console.log(err) 
    }
}

addVisitor = async (req, res) => {
    try {
        if(!req.body.ip || !req.body.country || !req.body.city)  return res.sendStatus(400)

        const visitor = new Visitor({
            ip: req.body.ip,
            country: req.body.country,
            city: req.body.city,
        })
        await visitor.save()

        res.status(202).send(JSON.stringify(visitor))
    } catch(err) {
        res.sendStatus(500)
        console.log(err) 
    }
}

module.exports = {
    countVisitor,
    addVisitor
}