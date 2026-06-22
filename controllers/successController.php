<?php
include_once __DIR__ . '/../models/order.php';
class SuccessController {
    public function Render() {
        if (isset($_SESSION['last_order_id'])) {
            $order_id = $_SESSION['last_order_id'];
            
            // Gọi các hàm Model đã viết ở trên để lấy dữ liệu đúng cấu trúc DB
            $order = getOrderById($order_id);
            $orderDetails = getOrderDetails($order_id);
            
            // Đổ giao diện view success
            include('views/success.php');
        } else {
            header('location: index.php?page=home');
            exit();
        }
    }
}
?>
