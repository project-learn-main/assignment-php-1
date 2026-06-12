<?php
include('../../models/database.php');

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $conn = $db->getConnection();

    $query = "UPDATE categories 
              SET name = '$name', description = '$description'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        setcookie('category_update_success', 'true', time() + 10, "/");
    } else {
        setcookie('category_update_error', 'true', time() + 10, "/");
    }

    header('Location: ../index.php?tab=category');
    exit();
}
