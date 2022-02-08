const router = require('express').Router()
const fileServices = require("../services/fileManagement")

router.post("/write_file", fileServices.writeFile)

router.get("/", (req, res) => {
    res.render("index")
})

module.exports = router