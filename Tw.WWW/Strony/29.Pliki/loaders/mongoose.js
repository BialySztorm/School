const mongoose = require('mongoose')

const url = ""//paste here credentials

mongoose.connect(url, {
    // some settings for better mongoose performance
    useNewUrlParser: true,
    useUnifiedTopology: true
})