SELECT p.ProductID , p.ProductName, c.CategoryName , s.CompanyName , p.UnitPrice 
FROM products p
JOIN categories c ON c.CategoryID = p.CategoryID
JOIN suppliers s ON s.SupplierID = p.SupplierID;
