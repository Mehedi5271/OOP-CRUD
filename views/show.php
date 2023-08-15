<?php

include './../vendor/autoload.php';

use Ecom\Controllers\ProductController;

$productController = new ProductController;

$product = $productController->show($_GET['id']);

?>

<h1>Id: <?= $product['id'] ?></h1> 
<h1>Title: <?= $product['title'] ?></h1> <br>

<a href="./index.php">List</a>
