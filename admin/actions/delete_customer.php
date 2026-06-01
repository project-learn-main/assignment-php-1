<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    foreach($_SESSION['customers'] as $index => $customer) {
        if($customer['id'] == $id) {
            unset($_SESSION['customers'][$index]);
            setcookie('customer_delete_success', 'true', time() + 10, "/");
            break;
        }
    }
    header('Location: ../index.php?tab=customers');
}
?>