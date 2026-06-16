<?php
include_once __DIR__ . '/../../models/order.php';
class OrderController
{
    public function Render()
    {
        $data = getAllOrders();
        include('views/order.php');
    }

    public function updateStatus()
    {
        $orderId = (int)$_POST['orderId'];
        $status = $_POST['status'];

        $result = updateOrderStatus($orderId, $status);
        if ($result) {
            setcookie('order_update_success', 'true', time() + 10, "/");
        } else {
            setcookie('order_update_error', 'true', time() + 10, "/");
        }
        header("Location: ?tab=order");
        exit();
    }
}
