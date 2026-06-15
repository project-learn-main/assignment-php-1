<?php
include_once __DIR__ . '/../../models/order.php';
class OrderController {
    public function Render() {
        $data = getAllOrders();
        include('views/order.php');
    }

    public function updateStatus()
{
    $orderId = (int)$_POST['orderId'];
    $status = $_POST['status'];

    updateOrderStatus($orderId, $status);

    header("Location: ?tab=order");
    exit();
}
}
?>
