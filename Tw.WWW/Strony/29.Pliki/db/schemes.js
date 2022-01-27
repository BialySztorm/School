const mongoose = require("mongoose")

const atlasSchema = new mongoose.Schema({    
    name: {
        type: String,
        unique: false,
    },
    description: String,
    file: String
}, {
    versionKey: false
})

// models with declared Schema
const Atlas = new mongoose.model("Atlas", atlasSchema)

module.exports = {
    Atlas
} 