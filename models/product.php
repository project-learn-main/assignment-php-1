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

function getTotalProductCount()
{
    global $db;
    $conn = $db->getConnection();
    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM products");
    $row = mysqli_fetch_assoc($result);
    return $row['total'] ?? 0;
}

function getProductsPagination($limit, $offset)
{
    global $db;
    $conn = $db->getConnection();

    $limit = (int)$limit;
    $offset = (int)$offset;

    $query = "SELECT
            products.*,
            categories.name AS category_name,
            users.fullname 
        FROM products
        INNER JOIN categories ON products.category_id = categories.id
        LEFT JOIN users ON products.created_by = users.id
        ORDER BY products.created_at DESC
        LIMIT $limit OFFSET $offset";

    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function createProduct($name, $price, $stock, $image, $categoryId, $description, $created_by)
{
    var_dump("🚀 ~ createProduct ~ $categoryId:", $categoryId);
    global $db;
    $conn = $db->getConnection();

    $query = "INSERT INTO products (name, price, stock, image, category_id, description,created_by) VALUES ('$name', '$price', '$stock', '$image', '$categoryId', '$description','$created_by')";

    $result = mysqli_query($conn, $query);

    return $result;
}

function updateProduct($id, $name, $price, $stock, $image, $categoryId, $description)
{
    global $db;
    $conn = $db->getConnection();

    $query = "
        UPDATE products
        SET
            name = '$name',
            price = '$price',
            stock = '$stock',
            category_id = '$categoryId',
            description = '$description'
    ";

    // Chỉ cập nhật ảnh nếu có ảnh mới
    if (!empty($image)) {
        $query .= ", image = '$image'";
    }

    $query .= " WHERE id = '$id'";

    return mysqli_query($conn, $query);
}

function deleteProduct($id)
{
    global $db;
    $conn = $db->getConnection();

    $query = "DELETE FROM products WHERE id = $id";

    $result = mysqli_query($conn, $query);

    return $result;
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

function getProductById($id)
{
    global $db;
    $conn = $db->getConnection();

    $id = (int)$id;

    $query = "SELECT
                products.*,
                categories.name AS category_name,
                users.fullname
              FROM products
              INNER JOIN categories
                ON products.category_id = categories.id
              LEFT JOIN users
                ON products.created_by = users.id
              WHERE products.id = $id
              LIMIT 1";

    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function addProduct($name, $price, $stock, $image, $categoryId, $description, $created_by)
{
    global $db;
    $conn = $db->getConnection();

    $query = "INSERT INTO products (name, price, stock, image, category_id, description,created_by) VALUES ('$name', '$price', '$stock', '$image', '$categoryId', '$description','$created_by')";

    $result = mysqli_query($conn, $query);

    return $result;
}

function getAllProductByPage($page, $perPage) {
    global $db;
    $conn = $db->getConnection();

    $offset = ($page - 1) * $perPage;

    $query = "SELECT * FROM products LIMIT $perPage OFFSET $offset";

    $result = mysqli_query($conn, $query);

    return $result;
}


