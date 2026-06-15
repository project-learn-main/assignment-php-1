<?php
include_once __DIR__ .  '/database.php';
   function getCartByUserId($userId)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "SELECT * FROM carts WHERE user_id = $userId LIMIT 1";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function createCart($userId)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "INSERT INTO carts (user_id) VALUES ($userId)";
    mysqli_query($conn, $sql);

    // Trả về ID của cart vừa tạo
    return mysqli_insert_id($conn);
}

function getCartItems($userId)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        SELECT
            cart_items.id,
            cart_items.product_id,
            products.name,
            products.image,
            products.price,
            cart_items.quantity
        FROM carts
        JOIN cart_items
            ON carts.id = cart_items.cart_id
        JOIN products
            ON products.id = cart_items.product_id
        WHERE carts.user_id = $userId
    ";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getCartItem($cartId, $productId)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        SELECT *
        FROM cart_items
        WHERE cart_id = $cartId
          AND product_id = $productId
        LIMIT 1
    ";

    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

function insertCartItem($cartId, $productId, $quantity)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        INSERT INTO cart_items (cart_id, product_id, quantity)
        VALUES ($cartId, $productId, $quantity)
    ";

    mysqli_query($conn, $sql);
}

function updateCartItem($id, $quantity)
{
    global $db;
    $conn = $db->getConnection();

    $sql = "
        UPDATE cart_items
        SET quantity = $quantity
        WHERE id = $id
    ";

    mysqli_query($conn, $sql);
}