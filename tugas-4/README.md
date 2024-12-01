# Tugas 4

## Folder Structure

```asciidoc
/
├─ facades/
│  ├─ connection.js
├─ repository/
│  ├─ customer.js
├─ views/
│  ├─ customer/
│  │  ├─ detail.ejs
│  │  ├─ index.ejs
├─ index.js
├─ package-lock.json
├─ package.json

```

## Install Dependency

List:

1. express

2. ejs

3. mysql2

```shell
npm i express ejs mysql2
```

## Code

`index.js`

```js
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
    } catch( err ) {
        console.log(err);
        res.send("error");
    }
});

app.get("/customer/:id", async (req, res) => {
    const id = req.params.id;    
    try {
        let customer = await getCustomerById(id);
        
        if(customer.length) {
            customer = customer[0];
            res.render("customer/detail", {
                customer
            );
        } else {
            res.send("id not found");
        }
    } catch (err) {
        console.log(err);
        res.send("error");
    }
})

app.listen(3000, () => {
   console.log("Server running at port 3000"); 
});
```

`config/connection.js`

```js
import mysql from "mysql2";

export const connection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "nwind",
});
```

`repository/customer.js`

```js
import connection from "./../config/database.js";

export const getAllCustomer = () => {
    return new Promise((resolve, reject) => {
        connection.query('SELECT * FROM customers', (err, rows) => {
            if (err) reject(err);
            else resolve(rows);
        });
    });
}

export const getCustomerById = (id) => {
    return new Promise((resolve, reject) => {
        connection.query(
            "SELECT * FROM customers WHERE CustomerID = ?",
            [id],
            (err, rows) => {
                if(err) reject(err);
                else resolve(rows)
            }
        )
    });
}
```

`views/customer/index.ejs`

```ejs
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Customer</title>
  </head>
  <body>
    <table border="1">
      <thead>
        <tr>
          <th>Customer ID</th>
          <th>Company Name</th>
          <th>Contact Name</th>
          <th>ContactTitle</th>
          <th>Address</th>
          <th>City</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <% customers.forEach((customer) => { %>
          <tr>
            <td><%= customer.CustomerID %></td>
            <td><%= customer.CompanyName %></td>
            <td><%= customer.ContactName %></td>
            <td><%= customer.ContactTitle %></td>
            <td><%= customer.Address %></td>
            <td><%= customer.City %></td>
            <th><a href="/customer/<%= customer.CustomerID %>">detail</a></th>
          </tr>
        <% }) %>
      </tbody>
    </table>
      
  </body>
</html>
```


