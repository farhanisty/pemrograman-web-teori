import express from "express";
import { getAllCustomer, getCustomerById } from "./repository/customer.js";

const app = express();

app.set("view engine", "ejs");

app.get("/", async (req, res) => {
  try {
    const customers = await getAllCustomer();
    res.render("index", {
      customers,
    });
  } catch (err) {
    console.log(err);
    res.send("hello world");
  }
});

app.get("/customer/:id", async (req, res) => {
  const id = req.params.id;
  try {
    let customer = await getCustomerById(id);
    console.log(customer);
    if (customer.length) {
      customer = customer[0];
      res.render("customer/detail", {
        customer,
      });
    } else {
      res.send("id not found");
    }
  } catch (err) {
    console.log(err);
    res.send("error");
  }
});

app.listen(3000, () => {
  console.log("Server running at port 3000");
});
