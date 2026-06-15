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

function getAllOrders()
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        SELECT
            orders.*,
            users.fullname,
            users.email
        FROM orders
        JOIN users
            ON orders.user_id = users.id
        ORDER BY orders.order_date DESC
    ";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function updateOrderStatus($orderId, $status)
{
    global $db;
    $conn = $db->getConnection();

    $status = mysqli_real_escape_string($conn, $status);

    $sql = "
        UPDATE orders
        SET status = '$status'
        WHERE id = $orderId
    ";

    return mysqli_query($conn, $sql);
}