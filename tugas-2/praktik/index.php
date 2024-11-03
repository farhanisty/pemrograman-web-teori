<?php

require_once (__DIR__ . '/ProductRepositoryFactory.php');

$productRepository = (new ProductRepositoryFactory())->get();
$products =
    $productRepository->get();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tugas 2</title>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Category Name</th>
          <th>Company Name</th>
          <th>Unit Price</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($products as $product): ?>
        <tr>
          <td><?= $product->ProductID ?></td>
          <td><?= $product->ProductName ?></td>
          <td><?= $product->CategoryName ?></td>
          <td><?= $product->CompanyName ?></td>
          <td><?= $product->UnitPrice ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
