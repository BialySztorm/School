const router = require('express').Router()
const fileServices = require("../services/fileManagement")

router.post("/get_files", fileServices.getFiles)

router.get("/", (req, res) => {
    res.render("index")
})

module.exports = router