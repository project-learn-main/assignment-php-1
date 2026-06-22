<?php
include_once __DIR__ . '/../models/user.php';
class RegisterController {
    public function Render() {
        include('views/register.php');
    }
    
   public function submitRegister()
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // 1. Gọi Model kiểm tra xem email trùng không
            if (checkEmailExists($email)) {
                setcookie('register_error', 'Email đã tồn tại', time() + 10, "/");
                header('location: index.php?page=register');
                exit();
            }

            // 2. Nếu không trùng, gọi Model thực hiện đăng ký
            if (register($name, $email, $password)) {
                setcookie('register_success', 'true', time() + 10, "/");
                header('location: index.php?page=login');
                exit();
            } else {
                // Thay vì echo trực tiếp ở đây, bạn có thể set cookie báo lỗi hệ thống
                setcookie('register_error', 'Đăng ký thất bại, vui lòng thử lại!', time() + 10, "/");
                header('location: index.php?page=register');
                exit();
            }
        }
    }
}
?>
