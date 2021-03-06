const app = require("./loaders/express")
const mainRouter = require("./routers/mainRoutes")

app.use(mainRouter)
// When nothing else handled request
app.use((req, res) => {
    res.status(404).render("errors/404", {title: "Status 404"})
})

app.use((err, req, res, next) => {
    res.status(err.status || 500).render('errors/500', {title: "Status 404"})
})
