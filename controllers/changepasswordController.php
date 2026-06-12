<?php
include_once 'models/user.php';
class ChangepasswordController {
    public function Render() {
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_SESSION['reset_email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $user = getUserByEmail($email);
            if (!$user) {
                echo "Email không tồn tại!";
                return;
            }
            if ($password !== $confirmPassword) {
                echo "Mật khẩu xác nhận không khớp!";
                return;
            }

            updatePassword($email, $password);

            unset($_SESSION['reset_email']);

            header("Location: ?page=login");    
            exit;
        }

        include 'views/changepassword.php';
    }
}
?>