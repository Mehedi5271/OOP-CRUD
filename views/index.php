<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
</head>
<body>

<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
    <?php 
   
    
    include './../vendor/autoload.php';
    use Ecom\Controllers\ProductController;
    $productController = new ProductController;

    $products = $productController->index();

    // echo "<pre>";
    // print_r($products);
       
    ?>

    <a href="./create.php">Add New</a>

    <?php 
    
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    
    ?>

<table border="1" style="width: 500px; margin: 0 auto;">
    <thead>
        <tr>
            <th>Serial</th>
            <!-- <th>ID</th> -->
            <th>Title</th>
            <th>Action</th>
            
           
        </tr>
    </thead>
    
    <?php 

      $sl =0;
    foreach($products as $product){ 
   
    ?>

    <tbody>
        <tr>
             <td> <?= ++$sl  ?> </td>
            <!-- <td> <?= $product['id'] ?> </td> -->
            <td><?= $product['title'] ?> </td>
            <td><a href="./show.php?id= <?= $product['id']?>">Show</a></td>
            <td><a href="./edit.php?id= <?= $product['id']?>">Edit</a></td>
            <td><a href="./delete.php?id= <?= $product['id']?>">Delete</a></td>
           

        </tr>
        <?php } ?>
    </tbody>
</table>
    
</body>
</html>