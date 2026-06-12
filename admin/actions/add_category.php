<?php
session_start();
include('../../models/database.php');
if (isset($_POST['name']) && isset($_POST['description'])) {

    $conn = $db->getConnection();
    $name = $_POST['name'];
    $description = $_POST['description'];

    $user = $_SESSION['admin_id'];
    var_dump("🚀 ~ $user:", $user);
    $query = "INSERT INTO categories (name,description,created_by) VALUES ('$name','$description','$user');";
    if (mysqli_query($conn, $query)) {
        setcookie('category_add_success', 'true', time() + 10, "/");
        header('Location: ../index.php?tab=category');
    } else {
        setcookie('category_add_error', 'true', time() + 10, "/");
    }
} else {
}

exit;
