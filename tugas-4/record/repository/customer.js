import connection from "./../facades/connection.js";

export function getAllCustomer() {
  return new Promise((resolve, reject) => {
    connection.query("SELECT * FROM customers", (err, rows) => {
      if (err) reject(err);
      else resolve(rows);
    });
  });
}

export function getCustomerById(id) {
  return new Promise((resolve, reject) => {
    connection.query(
      "SELECT * FROM customers WHERE CustomerID = ?",
      [id],
      (err, rows) => {
        if (err) reject(err);
        else resolve(rows);
      },
    );
  });
}
