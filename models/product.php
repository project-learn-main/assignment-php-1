<?php
include_once 'database.php';
function getAllProduct()
{
    global $db;
    $conn = $db->getConnection();

    $query = "SELECT
            products.*,
            categories.name AS category_name,
            users.fullname 
        FROM products
        INNER JOIN categories
            ON products.category_id = categories.id
        LEFT JOIN users
            ON products.created_by = users.id
        ORDER BY products.created_at DESC";

    $result = mysqli_query($conn, $query);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getProductByCategory()
{
    $products = getAllProduct();

    $productsByCategory = [];

    foreach ($products as $product) {
        $category = $product['category_name'];

        $productsByCategory[$category][] = $product;
    }

    return $productsByCategory;
}

function addProduct($name, $price, $stock, $image, $categoryId, $description, $created_by)
{
    global $db;
    $conn = $db->getConnection();

    $query = "INSERT INTO products (name, price, stock, image, category_id, description,created_by) VALUES ('$name', '$price', '$stock', '$image', '$categoryId', '$description','$created_by')";

    $result = mysqli_query($conn, $query);

    return $result;
}
