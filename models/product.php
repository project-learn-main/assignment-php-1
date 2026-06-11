<?php
include_once 'database.php';
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

function addProduct($name, $price, $stock, $image, $categoryId, $description)
{
    global $db;
    $conn = $db->getConnection();

    $query = "INSERT INTO products (name, price, stock, image, category_id, description) VALUES ('$name', '$price', '$stock', '$image', '$categoryId', '$description')";

    $result = mysqli_query($conn, $query);

    return $result;
}
