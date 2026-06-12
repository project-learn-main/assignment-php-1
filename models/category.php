<?php
include_once __DIR__ .  '/database.php';
function getAllCategory()
{
    global $db;
    $conn = $db->getConnection();

    $result = mysqli_query($conn, "SELECT * FROM categories ORDER BY created_at DESC");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function createCategory($name, $description, $createdBy)
{
    global $db;
    $conn = $db->getConnection();

    $query = "INSERT INTO categories (name, description, created_by)
              VALUES ('$name', '$description', '$createdBy')";

    return mysqli_query($conn, $query);
}

function updateCategory($id, $name, $description)
{
    global $db;
    $conn = $db->getConnection();

    $query = "UPDATE categories 
              SET name = '$name', 
                  description = '$description'
              WHERE id = $id";

    return mysqli_query($conn, $query);
}

function deleteCategory($id)
{
    global $db;
    $conn = $db->getConnection();

    $query = "DELETE FROM categories
        WHERE id = $id
        AND NOT EXISTS (
            SELECT 1
            FROM products
            WHERE products.category_id = categories.id
        )";

    $result = mysqli_query($conn, $query);
    $affectedRows = mysqli_affected_rows($conn);
    return $affectedRows > 0;
}