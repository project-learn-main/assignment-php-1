<?php
class LogoutController
{

    public function logout()
    {
        // Xóa toàn bộ session
        session_unset();
        session_destroy();

        // Điều hướng về trang login
        header('location: index.php?page=login');
        exit();
    }
}