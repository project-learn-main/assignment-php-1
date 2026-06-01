<?php
include('views/header.php');
if(isset($_GET['tab'])) {
    // include 'views/' . $_GET['page'] . '.php';
    switch($_GET['tab']) {
        case 'dashboard':
            include('controllers/dashboardController.php');
            $controller = new DashboardController();
            $controller->Render();
            break;
        case 'order':
            include('controllers/orderController.php');
            $controller = new OrderController();
            $controller->Render();
            break;
        case 'category':
            include('controllers/categoryController.php');
            $controller = new CategoryController();
            $controller->Render();
            break;
        case 'product':
            include('controllers/productController.php');
            $controller = new ProductController();
            $controller->Render();
            break;
        case 'user':
            include('controllers/userController.php');
            $controller = new UserController();
            $controller->Render();
            break;
    }
} else {
    include('controllers/dashboardController.php');
    $controller = new DashboardController();
    $controller->Render();
}

include 'Element/modals.php';
include('views/footer.php');
?>