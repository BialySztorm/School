const router = require('express').Router()
const atlasServices = require("../services/atlasManagement")

router.post("/get_animals", atlasServices.getAnimals)
router.post("/search_animals", atlasServices.searchAnimals)
router.post("/add_animal", atlasServices.addAnimal)

router.get("/", (req, res) => {
    res.render("index")
})

module.exports = router