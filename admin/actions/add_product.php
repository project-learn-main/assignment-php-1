<?php

if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['categoryId']) 
    && isset($_POST['description']) && isset($_FILES['image'])) { 

    include('../../models/database.php');

    $conn = $db->getConnection();
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $categoryId = $_POST['categoryId'];
    $description = $_POST['description'];
    $image = $_FILES['image'];
    
   
    $path = __DIR__ . '/../images'; 
   
    $picture = $_FILES['image'];
    $path = __DIR__ . '/../images'; 

    $imageName = time() . '_' . $picture['name'];
    
    if (!is_dir($path))
        mkdir($path);
    
    $targetPath = $path . '/' . $imageName;

     $query = "INSERT INTO products (name,price,stock,category_id,description,image) VALUES ('$name','$price','$stock','$categoryId','$description','$imageName');";
    if (move_uploaded_file($picture['tmp_name'], $targetPath) && mysqli_query($conn, $query)) {
       setcookie('product_add_success', 'true', time() + 10, "/");
    } else {
        setcookie('product_add_error', 'true', time() + 10, "/");
    }
}
header('Location: ../index.php?tab=product');
?>
