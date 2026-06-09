<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $query = "delete from products where id = $id";
    include('../../models/database.php');
    $conn = $db->getConnection();

    if (mysqli_query($conn, $query)) {
        setcookie('product_delete_success', 'true', time() + 10, "/");
    } else {
        setcookie('product_delete_error', 'true', time() + 10, "/");
    }
    
    header('Location: ../index.php?tab=product');
}
?>