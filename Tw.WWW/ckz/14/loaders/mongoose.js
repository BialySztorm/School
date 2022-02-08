const mongoose = require('mongoose')

const url = "mongodb://mo24648_School:Swinia2002!@mongo.ct8.pl:27017/mo24648_School"

mongoose.connect(url, {
    // some settings for better mongoose performance
    useNewUrlParser: true,
    useUnifiedTopology: true
})