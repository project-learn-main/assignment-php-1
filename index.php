<?php
include('views/header.php');
if (isset($_GET['page'])) {
    // include 'views/' . $_GET['page'] . '.php';
    switch ($_GET['page']) {
        case 'home':
            include('controllers/homeController.php');
            $controller = new HomeController();
            $controller->Render();
            break;
        case 'login':
            include('views/login.php');
            break;
        case 'register':
            include('controllers/registerController.php');
            $controller = new RegisterController();
            $controller->Render();
            break;
        case 'forgotpassword':
            include('controllers/forgotpasswordController.php');
            $controller = new ForgotpasswordController();
            $controller->Render();
            break;
        case 'changepassword':
            include('controllers/changepasswordController.php');
            $controller = new ChangepasswordController();
            $controller->Render();
            break;
        case 'products':
            include('controllers/productsController.php');
            $controller = new ProductsController();
            $controller->Render();
            break;
        case 'cart':
            include('controllers/cartController.php');
            $controller = new CartController();

            if (isset($_GET['action']) && $_GET['action'] == 'add') {
                $controller->Add();
            } else {
                $controller->Render();
            }

            break;
        case 'success':
            include('controllers/successController.php');
            $controller = new SuccessController();
            $controller->Render();
            break;
        case 'product-detail':
            include('controllers/productDetailController.php');
            $controller = new ProductDetailController();
            $controller->Render();
            break;
        case 'checkout':
            include('controllers/checkoutController.php');
            $controller = new CheckoutController();
            $controller->Render();
            break;
    }
} else {
    include('controllers/homeController.php');
    $controller = new HomeController();
    $controller->Render();
}
include('views/footer.php');
