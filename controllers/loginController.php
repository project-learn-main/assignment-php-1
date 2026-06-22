<?php
include_once __DIR__ . '/../models/database.php';
include_once __DIR__ . '/../models/user.php';

class LoginController
{
    public function Render()
    {
        include('views/login.php');
    }

    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = login($email, $password);

            if ($user) {
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['role'] = $user['role'];

                setcookie('login_success', 'true', time() + 10, "/");
                header('location: index.php?page=home');
                exit();
            } else {
                setcookie('login_error', 'true', time() + 10, "/");
                header('location: index.php?page=login');
                exit();
            }
        }
    }
}