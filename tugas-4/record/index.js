import express from "express";
import { getAllCustomer, getCustomerById } from "./repository/customer.js";

const app = express();

app.set("view engine", "ejs");

app.get("/", async (req, res) => {
  try {
    const customers = await getAllCustomer();
    res.render("customer/index", {
      customers,
    });
  } catch (err) {
    console.log(err);
    res.send("error");
  }
});

app.get("/customer/:id", async (req, res) => {
  const id = req.params.id;

  try {
    let customer = await getCustomerById(id);

    if (customer.length) {
      customer = customer[0];

      res.render("customer/detail", {
        customer,
      });
    } else {
      res.send("Id not found");
    }
  } catch (err) {
    console.log(err);
    res.send("error");
  }
});

app.listen(3000, () => {
  console.log("Servel run on port 3000");
});
