<?php
include_once __DIR__ . '/../../models/order.php';
class OrderController {
    public function Render() {
        $data = getAllOrders();
        include('views/order.php');
    }
}
?>
