<?php 
namespace Ecom\Controllers;
use PDO;
use PDOException;



class ProductController
{

  private $conn;
    public function __construct()
    {
       

try {
  session_start();
  $this->conn = new PDO("mysql:host=localhost;dbname=ecom", 'root', '');
  // set the PDO error mode to exception
  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully"."<br>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
    }

    public function index()
    {

      $query = "SELECT * FROM `products`";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll();

    }

    public function store(array $data)
{

  try{
    $sql = "INSERT INTO `products` (`title`) VALUES (:title)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
       'title' => $data['title'],
    ]);
    $_SESSION['message']= 'created succesfully';
    header('location:./index.php');
  } catch(PDOException $e){
    echo $e->getMessage();
  }
  
}

public function show($id)
{
 $sql = "SELECT * FROM `products` WHERE id = $id";
 $stmt = $this->conn->prepare($sql);
 $stmt->execute();
 return $stmt->fetch();

}


public function update(array $data)
{

  try{
    $sql = "UPDATE `products` SET `title`= :title  WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([
       'title' => $data['title'],
       'id' => $data['id']
    ]);
    $_SESSION['message']= 'Updated succesfully';
    header('location:./index.php');
  } catch(PDOException $e){
    echo $e->getMessage();
  }
  
}

public function destroy( int $id)
{
  
  try {
    $sql = "DELETE FROM products WHERE id=$id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $_SESSION['message'] = 'Deleted successfully';
    header('location:./index.php');

  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}



}



?>