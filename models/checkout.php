<?php
include_once __DIR__ . "/database.php";
include_once __DIR__ . "/cart.php";

function createOrder($userId, $total)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        INSERT INTO orders
        (user_id, total_amount, status, order_date)
        VALUES
        ($userId, $total, 'pending', NOW())
    ";

    mysqli_query($conn, $sql);

    return mysqli_insert_id($conn);
}

function createOrderDetail($orderId, $productId, $quantity, $price)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        INSERT INTO order_details
        (order_id, product_id, quantity, price)
        VALUES
        ($orderId, $productId, $quantity, $price)
    ";

    mysqli_query($conn, $sql);
}

function clearCart($userId)
{
    global $db;
    $conn = $db->getConnection();

    $cart = getCartByUserId($userId);

    if (!$cart) {
        return;
    }

    $cartId = $cart["id"];

    mysqli_query(
        $conn,
        "DELETE FROM cart_items WHERE cart_id = $cartId"
    );
}