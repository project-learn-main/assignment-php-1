<?php
include_once "models/cart.php";

class CartController
{
    // Hiển thị giỏ hàng
    public function Render()
    {
        if (!isset($_SESSION['userId'])) {
            header("Location: ?page=login");
            exit();
        }
        $userId = $_SESSION['userId'];

        $items = getCartItems($userId);

        include("views/cart.php");
    }

    // Thêm sản phẩm vào giỏ
    public function Add()
    {
        $userId = $_SESSION['userId'];
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        $cart = getCartByUserId($userId);

        if (!$cart) {
            $cartId = createCart($userId);
        } else {
            $cartId = $cart['id'];
        }

        $item = getCartItem($cartId, $productId);

        if ($item) {
            updateCartItem(
                $item['id'],
                $item['quantity'] + $quantity
            );
        } else {
            insertCartItem(
                $cartId,
                $productId,
                $quantity
            );
        }

        setcookie('add_to_cart_success', 'true', time() + 10, "/");
        header("Location: ?page=product-detail&&id=" . $productId);
        exit();
    }
}
?>