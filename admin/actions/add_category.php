<?php
session_start();
if (isset($_POST['name']) && isset($_POST['description'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    setcookie('customer_add_success', 'true', time() + 10, "/");
} else {
    setcookie('customer_add_error', 'true', time() + 10, "/");
}

// header('Location: ../index.php?tab=category');
exit;
