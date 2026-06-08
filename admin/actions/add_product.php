<?php

if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['categoryId']) 
    && isset($_POST['description']) && isset($_FILES['image'])) { 

    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $categoryId = $_POST['categoryId'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    $path = __DIR__ . '/../images'; 
   
    $picture = $_FILES['image'];
    $path = __DIR__ . '/../images'; 
    
    if (!is_dir($path))
        mkdir($path);

    $targetPath = $path . '/' . $picture['name'];
    if (move_uploaded_file($picture['tmp_name'], $targetPath)) {
        // Add product to database 
        // For now, just log the action
        error_log("Product added: " . $name . " - " . $price);
    } else {
        setcookie('student_add_error', 'true', time() + 10, "/");
    }

}
header('Location: ../index.php?tab=product');
exit;
?>
