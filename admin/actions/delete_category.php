<?php

if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];

    include('../../models/database.php');
    $conn = $db->getConnection();

    $query = "
        DELETE FROM categories
        WHERE id = $id
        AND NOT EXISTS (
            SELECT 1
            FROM products
            WHERE products.category_id = categories.id
        )
    ";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        setcookie('category_delete_success', 'true', time() + 10, "/");
    } else {
        setcookie('category_delete_error', 'true', time() + 10, "/");
    }

    header('Location: ../index.php?tab=category');
    exit();
}
