<?php
include('database.php');
function getAllUser()
{
    global $db;
    $conn = $db->getConnection();

    $result = mysqli_query($conn, "SELECT * FROM users ORDER BY created_at DESC;");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
