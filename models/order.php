<?php
include_once __DIR__ .  '/database.php';
function createOrder($userId, $fullname, $phone, $address, $total)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        INSERT INTO orders
        (user_id, fullname, phone, address, total_amount)
        VALUES
        ($userId,
        '$fullname',
        '$phone',
        '$address',
        $total)
    ";

    mysqli_query($conn, $sql);

    return mysqli_insert_id($conn);
}