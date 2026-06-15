<?php

if (!isset($_SESSION['customers'])) {
    $_SESSION['customers'] = $customer;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
    if ($_GET['action'] === 'get' && isset($_GET['id'])) {
        $customerId = $_GET['id'];
        $customers = $_SESSION['customers'];

        $foundCustomer = null;
        foreach ($customers as $customer) {
            if ($customer['id'] === $customerId) {
                $foundCustomer = $customer;
                break;
            }
        }

        header('Content-Type: application/json');
        if ($foundCustomer) {
            echo json_encode($foundCustomer);
        } else {
            echo json_encode(null);
        }
        exit;
    }
}
