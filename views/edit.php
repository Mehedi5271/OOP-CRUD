<?php

include './../vendor/autoload.php';

use Ecom\Controllers\ProductController;

$productController = new ProductController;

$product = $productController->show($_GET['id']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<body>
    <div style="width: 500px; margin: 0 auto; "> 
    <a href="./index.php">List</a>
    <form action="./update.php" method="post">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <input type="text" name="title" value="<?= $product['title'] ?>">
        <input type="submit" value="Update">
    </form>
    </div>
    
</body>
</html>