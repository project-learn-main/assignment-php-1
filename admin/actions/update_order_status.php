<?php
session_start();
if (isset($_POST["orderId"]) && isset($_POST["status"])) {
    $id = $_POST['orderId'];
    $status = $_POST['status'];
    foreach ($_SESSION['orders'] as $index => $order) {
        if ($order['orderId'] == $id) {
            $_SESSION['orders'][$index]['status'] = $status;
            setcookie('order_update_success', 'true', time() + 10, "/");
            break;
        }
    }
    header('Location: ../index.php?tab=order');
} else {
    echo ("error");
}
