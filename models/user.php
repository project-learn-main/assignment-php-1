<?php
include_once 'database.php';
function getAllUser()
{
    global $db;
    $conn = $db->getConnection();
    $currentUserId = $_SESSION['admin_id'];

    $result = mysqli_query($conn, "SELECT * 
         FROM users 
         WHERE id != $currentUserId
         ORDER BY created_at DESC");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
