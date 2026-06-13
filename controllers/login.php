<?php
include_once 'models/user.php';
class LoginController
{
    public function Render()
    {
        include('views/login.php');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            // Gọi Model để lấy thông tin user

            $user = getUserByEmail($email);

            if ($user && $password ==  $user["password"]) {
                session_start();
                $_SESSION['user'] = $user;

                header("Location: index.php");
                exit;
            } else {
                $error = "Email hoặc mật khẩu không đúng.";
                include('views/login.php');
            }
        }
    }
}
