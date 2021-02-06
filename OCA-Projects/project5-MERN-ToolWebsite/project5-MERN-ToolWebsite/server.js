const express = require("express");
const connectDb = require("./config/db");

const app = express();

connectDb();

// init MidelWare
app.use(express.json({ extended: false }));

app.get("/", (req, res) => {
  res.send("API RUNNING");
});

app.use("/api/orders", require("./routes/api/order"));

const port = process.env.PORT || 5001;

app.listen(port, () => console.log(`Server is up and running on port ${port}`));
