<?php
include('database.php');
function getAllProduct()
{
    global $db;
    $conn = $db->getConnection();

    $result = mysqli_query($conn, "SELECT * FROM products ORDER BY created_at DESC;");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
