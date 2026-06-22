<?php
include_once __DIR__ . '/../models/database.php';
include_once __DIR__ . '/../models/checkout.php'; 
include_once __DIR__ . '/../models/cart.php'; 

class CheckoutController
{
    public function Render()
    {
        // Đồng bộ userId viết thường/viết hoa từ Login Session của bạn
        $userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : 1; 
        
        // GỌI CHÍNH XÁC HÀM TRONG FILE CART MODEL CỦA BẠN
        $items = getCartItems($userId); 
        
        include('views/checkout.php');
    }

    public function PlaceOrder()
    {
        $userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : 1;

        // GỌI CHÍNH XÁC HÀM TRONG FILE CART MODEL CỦA BẠN
        $items = getCartItems($userId);

        if (empty($items)) {
            header('location: index.php?page=cart');
            exit();
        }

        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $orderId = createOrder($userId, $total);

        if ($orderId) {
            foreach ($items as $item) {
                createOrderDetail($orderId, $item['product_id'], $item['quantity'], $item['price']);
            }

            clearCart($userId);

            $_SESSION['last_order_id'] = $orderId;

            header('location: index.php?page=success');
            exit();
        } else {
            echo "Thanh toán thất bại.";
        }
    }
}