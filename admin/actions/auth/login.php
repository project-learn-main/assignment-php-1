<?php
session_start();
include('../../../models/database.php');
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    global $db;
    $sql = "SELECT * FROM users 
            WHERE email = '$email' 
            AND password = '$password' 
            AND role = 'admin'";

    $result = mysqli_query($db->getConnection(), $sql);
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_name'] = $user['fullname'];

        header('Location: ../../index.php');
        setcookie('login_success', 'true', time() + 10, "/");
        exit();
    } else {
        header('Location: ../../views/login.php');
        setcookie('login_error', 'true', time() + 10, "/");
    }
}
