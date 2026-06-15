<?php
include_once "models/checkout.php";

class CheckoutController
{
    public function Render()
    {
        if (!isset($_SESSION['userId'])) {
            header("Location: ?page=login");
            exit();
        }

        $userId = $_SESSION['userId'];
        $items = getCartItems($userId);

        include "views/checkout.php";
    }

    public function PlaceOrder()
    {
        if (!isset($_SESSION['userId'])) {
            header("Location: ?page=login");
            exit();
        }

        $userId = $_SESSION['userId'];

        // Lấy sản phẩm trong giỏ
        $items = getCartItems($userId);

        if (empty($items)) {
            header("Location: ?page=cart");
            exit();
        }

        // Tính tổng tiền
        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Tạo đơn hàng
        $orderId = createOrder($userId, $total);

        // Lưu chi tiết đơn hàng
        foreach ($items as $item) {
            createOrderDetail(
                $orderId,
                $item['product_id'],
                $item['quantity'],
                $item['price']
            );
        }

        // Xóa giỏ hàng
        clearCart($userId);

        header("Location: ?page=success");
        exit();
    }
}
?>