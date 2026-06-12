<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: ./views/login.php');
    exit();
}

$tab = $_GET['tab'] ?? 'dashboard';
$action = $_GET['action'] ?? null;

if ($tab == 'category') {
    include('controllers/categoryController.php');
    $controller = new CategoryController();

    if ($action == 'create') {
        $controller->Create();
        exit();
    }

    if ($action == 'update') {
        $controller->Update();
        exit();
    }

    if ($action == 'delete') {
        $controller->Delete();
        exit();
    }
}


// Từ đây mới bắt đầu hiển thị giao diện
include('views/header.php');

switch ($tab) {
    case 'dashboard':
        include('controllers/dashboardController.php');
        (new DashboardController())->Render();
        break;

    case 'category':
        if (!isset($controller)) {
            include('controllers/categoryController.php');
            $controller = new CategoryController();
        }

        $controller->Render();
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