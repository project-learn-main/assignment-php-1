<?php
session_start();
if (isset($_POST['email']) && isset($_POST['password'])) {
    include('../models/database.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db->getConnection(), $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['userId'] = $user['id'];
        setcookie('login_success', 'true', time() + 10, "/");
        header('location: ../index.php?page=home');
    } else {
        setcookie('login_error', 'true', time() + 10, "/");
        header('location: ../index.php?page=login');
    }
}
