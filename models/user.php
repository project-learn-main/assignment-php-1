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

function getUserByEmail($email)
{
    var_dump("🚀 ~ getUserByEmail ~ $email:", $email);
    global $db;
    $conn = $db->getConnection();

    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}

function updatePassword($email, $password)
{
    global $db;
    $conn = $db->getConnection();

    $query = "UPDATE users
              SET password = '$password'
              WHERE email = '$email'";

    return mysqli_query($conn, $query);
}
