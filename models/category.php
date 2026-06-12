<?php
include_once 'database.php';
function getAllCategory()
{
    global $db;
    $conn = $db->getConnection();

    $result = mysqli_query($conn, "
    SELECT categories.*,users.fullname FROM categories
        LEFT JOIN users
            ON categories.created_by = users.id
        ORDER BY categories.created_at DESC");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
