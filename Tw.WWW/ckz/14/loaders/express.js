require('./mongoose')
const express = require('express')
const hbs = require("hbs")
const bp = require('body-parser')

const port = process.env.PORT || 5000
const app = express()

// Set partials directory and use hbs to send html pages to client
hbs.registerPartials("views/partials")
app.set("view engine", "hbs")
const fs = require('fs');

// Allows to parse whole json trough URL. Without it app can't read request body.
app.use(bp.json())
app.use(bp.urlencoded({ extended: true }))

// Middleware for reading cookies from request

app.use(express.static("build"))

app.use(express.static("public"))

app.listen(port)

module.exports = app