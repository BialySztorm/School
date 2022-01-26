const router = require('express').Router()
const fileServices = require("../services/fileManagement")
const visitorServices = require("../services/visitorManagement")

router.post("/write_file", fileServices.writeFile)
router.post("/count_visitor", visitorServices.countVisitor)
router.post("/add_visitor", visitorServices.addVisitor)

router.get("/", (req, res) => {
    res.render("index")
})

module.exports = router