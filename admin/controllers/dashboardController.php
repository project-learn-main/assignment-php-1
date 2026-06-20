<?php
include_once __DIR__ . '/../../models/order.php';
include_once __DIR__ . '/../../models/user.php';
class DashboardController {
    public function Render() {
        $countPendingOrders = count(getPendingOrders());
        $countAdmin  = count(getAllAdmins());
        $data = getCompleteOrders();
        $countCompleteOrders = count($data);
        include('views/dashboard.php');
    }
}
?>
