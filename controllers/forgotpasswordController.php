<?php
include_once 'models/user.php';
class ForgotpasswordController {
    public function Render() {
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $user = getUserByEmail($email);

            if ($user) {
                // Lưu email để dùng ở bước tiếp theo
                $_SESSION['reset_email'] = $email;

                header("Location: ?page=changepassword");
                exit;
            } else {
                echo "Email không tồn tại!";
            }
        }

        include 'views/forgotpassword.php';
    }
}
?>