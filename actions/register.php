<?php
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    include('../models/database.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db->getConnection(), $check);
    if (mysqli_num_rows($result) > 0) {
       setcookie('register_error', 'Email đã tồn tại', time() + 10, "/");
       header('location: ../index.php?page=register');
       exit;
    }

    $query = "INSERT INTO users (fullName, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($db->getConnection(), $query)) {
    setcookie('register_success', 'true', time() + 10, "/");
        header('location: ../index.php?page=login');
    } else {
        echo "Đăng ký thất bại: " . mysqli_error($db->getConnection());
    }
}
?>