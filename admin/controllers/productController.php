<?php
include_once '../models/product.php';
include_once '../models/category.php';

class ProductController
{
    public function Render()
    {
        $data = getAllProduct();
        $categories = getAllCategory();
        include('views/product.php');
    }
    
    public function Create()
    {
        if (
    isset($_POST['name']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_POST['categoryId'])
    && isset($_POST['description']) && isset($_FILES['image'])
) 
    {
    
            global $db;
        
            $conn = $db->getConnection();
        
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $categoryId = $_POST['categoryId'];
            $description = $_POST['description'];
            $image = $_FILES['image'];
            $user = $_SESSION['admin_id'];
        
            $path = __DIR__ . '/../images';
        
            $picture = $_FILES['image'];
        
            $imageName = time() . '_' . $picture['name'];
        
            if (!is_dir($path))
                mkdir($path);
        
            $targetPath = $path . '/' . $imageName;
            createProduct($name, $price, $stock,$imageName, $categoryId, $description,  $user);
            if (move_uploaded_file($picture['tmp_name'], $targetPath)) {
                setcookie('product_add_success', 'true', time() + 10, "/");
            } else {
                setcookie('product_add_error', 'true', time() + 10, "/");
            }
        }
                header('Location: ../admin/index.php?tab=product');
        }

       public function Update()
{
    if (!empty($_POST['id'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $categoryId = $_POST['categoryId'];
        $path = __DIR__ . '/../images';
        $sqlImage = "";
        
            if (!is_dir($path))
                mkdir($path);

        if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
        $image = time() . "_" . $_FILES['image']['name'];

        // Lưu ảnh vào admin/images
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $path . '/' . $image
        );

        $sqlImage = ", image='$image'";
    }

      $result=   updateProduct(
            $id,
            $name,
            $price,
            $stock,
            $image,
            $categoryId,
            $description
        );

        if ($result) {
            setcookie('product_update_success', 'true', time() + 10, "/");
        } else {
            setcookie('product_update_error', 'true', time() + 10, "/");
        }
        
        header("Location: index.php?tab=product");
        exit();
    }
}

    public function Delete()
    {
        if (!empty($_POST['id'])) {
            $result = deleteProduct($_POST['id']);
            
            if ($result) {
                setcookie('product_delete_success', 'true', time() + 10, "/");
            } else {
                setcookie('product_delete_error', 'true', time() + 10, "/");
            }
            header("Location: index.php?tab=product");
        }
    }
}
