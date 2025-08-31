const express = require("express");
const app = express();
const port = 80;

// Serve static files from the 'ml' directory at /ml/*
app.use("/ml", express.static("ml"));
app.use("/yash", express.static("yash"));
app.use("/web", express.static("web"));
app.use("/web2", express.static("web2"));
app.use("/iot", express.static("Iot"));

app.get("/", (req, res) => {
  res.send("Hello World!");
});

app.listen(port, () => {
  console.log(`Server is running at http://localhost:${port}`);
});
