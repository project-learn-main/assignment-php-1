<?php
session_start();
include('../../models/database.php');
if (isset($_POST['name']) && isset($_POST['description'])) {
    $conn = $db->getConnection();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query = "INSERT INTO categories (name,description) VALUES ('$name','$description');";
    if (mysqli_query($conn, $query)) {
        setcookie('category_add_success', 'true', time() + 10, "/");
        header('Location: ../index.php?tab=category');
    } else {
        setcookie('category_add_error', 'true', time() + 10, "/");
        echo "Thêm thất bại: " . mysqli_error($conn);
    }
} else {
}

exit;
