<?php
include('database.php');
function getAllProduct()
{
    global $db;
    $conn = $db->getConnection();

    $query = "SELECT 
        products.*,
        categories.name AS category_name
    FROM products
    INNER JOIN categories
        ON products.category_id = categories.id";

    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
