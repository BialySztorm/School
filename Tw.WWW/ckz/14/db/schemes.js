const mongoose = require("mongoose")

const visitorSchema = new mongoose.Schema({    
    ip: {
        type: String,
        unique: false,
    },
    country: String,
    city: String
}, {
    versionKey: false
})

// models with declared Schema
const Visitor = new mongoose.model("Visitor", visitorSchema)

module.exports = {
    Visitor
} 