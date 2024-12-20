<?php

require_once (__DIR__ . '/ProductRepository.php');
require_once (__DIR__ . '/Connection.php');

class MySQLProductRepository implements ProductRepository
{
    public function get(): array
    {
        $connection = Connection::getInstance();

        $stmt = $connection->query('select p.ProductID , p.ProductName, c.CategoryName , s.CompanyName , p.UnitPrice from products p join categories c ON c.CategoryID = p.CategoryID join suppliers s ON s.SupplierID = p.SupplierID;');

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}
