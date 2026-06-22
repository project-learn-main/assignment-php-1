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
    users.email,
    order_details.quantity AS item_quantity,
    order_details.price AS item_price,
    products.name AS product_name,
    products.image AS product_image
    FROM orders
    JOIN users 
        ON orders.user_id = users.id
    JOIN order_details 
        ON orders.id = order_details.order_id
    JOIN products 
        ON order_details.product_id = products.id
    ORDER BY orders.order_date DESC;
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

function getPendingOrders()
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        SELECT 
            orders.*, 
            users.fullname, 
            users.email,
            order_details.quantity AS item_quantity,
            order_details.price AS item_price,
            products.name AS product_name,
            products.image AS product_image
        FROM orders
        JOIN users 
            ON orders.user_id = users.id
        JOIN order_details 
            ON orders.id = order_details.order_id
        JOIN products 
            ON order_details.product_id = products.id
        WHERE orders.status = 'pending'
        ORDER BY orders.order_date DESC;
    ";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getCompleteOrders()
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        SELECT COUNT(*) as total FROM orders WHERE status = 'completed';
    ";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getOrderById($order_id) {
    global $db;
    $conn = $db->getConnection();
    $order_id = intval($order_id);
    
    $query = "SELECT * FROM orders WHERE id = $order_id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Lấy danh sách sản phẩm thuộc đơn hàng đó (kèm theo tên sản phẩm từ bảng products)
function getOrderDetails($order_id) {
    global $db;
    $conn = $db->getConnection();
    $order_id = intval($order_id);
    
    // Câu lệnh JOIN liên kết bảng order_details và bảng products
    $query = "SELECT od.*, p.name AS product_name 
              FROM order_details od 
              JOIN products p ON od.product_id = p.id 
              WHERE od.order_id = $order_id";
              
    $result = mysqli_query($conn, $query);
    $details = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $details[] = $row;
    }
    return $details;
}