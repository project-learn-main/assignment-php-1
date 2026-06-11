<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ./views/login.php');
    exit();
}

// Từ đây là đã đăng nhập
include('views/header.php');

switch ($_GET['tab'] ?? 'dashboard') {

    case 'dashboard':
        include('controllers/dashboardController.php');
        (new DashboardController())->Render();
        break;

    case 'category':
        include('controllers/categoryController.php');
        (new CategoryController())->Render();
        break;

    case 'product':
        include('controllers/productController.php');
        (new ProductController())->Render();
        break;

    case 'order':
        include('controllers/orderController.php');
        (new OrderController())->Render();
        break;

    case 'user':
        include('controllers/userController.php');
        (new UserController())->Render();
        break;
}

include('views/footer.php');
