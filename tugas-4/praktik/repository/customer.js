import connection from "./../config/database.js";

export const getAllCustomer = () => {
  return new Promise((resolve, reject) => {
    connection.query("SELECT * FROM customers", (err, rows) => {
      if (err) reject(err);
      else resolve(rows);
    });
  });
};
