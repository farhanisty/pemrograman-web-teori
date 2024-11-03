<?php

require_once (__DIR__ . '/ProductRepository.php');
require_once (__DIR__ . '/MySQLProductRepository.php');

class ProductRepositoryFactory
{
    public function get(): ProductRepository
    {
        return new MySQLProductRepository();
    }
}
