<?php
include('../../models/database.php');

if (
    isset($_POST['id']) &&
    isset($_POST['name']) &&
    isset($_POST['description']) &&
    isset($_POST['categoryId'])
) {

    $conn = $db->getConnection();

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $categoryId = $_POST['categoryId'];

    // Mặc định không đổi ảnh
    $sqlImage = "";

    // Nếu chọn ảnh mới
    if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
        $image = time() . "_" . $_FILES['image']['name'];

        // Lưu ảnh vào admin/images
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../images/" . $image
        );

        $sqlImage = ", image='$image'";
    }

    $sql = "UPDATE products 
            SET name='$name',
                description='$description',
                category_id='$categoryId'
                $sqlImage
            WHERE id='$id'";

    mysqli_query($conn, $sql);

    header("Location: ../index.php?tab=product");
    exit();
}