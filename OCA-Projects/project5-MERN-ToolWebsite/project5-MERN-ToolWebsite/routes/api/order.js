const router = require("express").Router();
const Order = require("../../models/Order");

router.get("/", (req, res) => {
  res.json("Order Route");
});

// Add An Order
router.post("/add", (req, res) => {
  const {
    username,
    ordername,
    description,
    price,
    quantity,
    addons,
  } = req.body;
  if (!username) {
    return res.status("401").json("Unauthorized");
  }
  const newOrder = new Order({
    username,
    ordername,
    description,
    price,
    quantity,
    addons,
  });
  newOrder
    .save()
    .then(res.json("Order has been added"))
    .catch((err) => res.status("400").json(`Error : ${err}`));
});
//Get the Order According to the username
router.get("/:username", (req, res) => {
  Order.find({ username: req.params.username })
    .then((orders) => res.json(orders))
    .catch((err) => res.status("400").json(`Error: ${err}`));
});
module.exports = router;
