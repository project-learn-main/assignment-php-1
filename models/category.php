<?php
include_once 'database.php';
function getAllCategory()
{
    global $db;
    $conn = $db->getConnection();

    $result = mysqli_query($conn, "SELECT * FROM categories ORDER BY created_at DESC;");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
