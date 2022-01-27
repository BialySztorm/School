const router = require('express').Router()
const atlasServices = require("../services/atlasManagement")
const fileServices = require('../services/fileHandler')

router.post("/get_animals", atlasServices.getAnimals)
router.post("/search_animals", atlasServices.searchAnimals)
router.post("/add_animal", atlasServices.addAnimal)

router.post("/upload_img", fileServices.upload.single("img"), fileServices.saveImage)

router.get("/", (req, res) => {
    res.render("index")
})

module.exports = router