<?php
class LogoutController
{
    public function Render()
    {
        // Vì đăng xuất là hành động xử lý luôn, ta gọi luôn hàm logout ở đây
        $this->logout();
    }

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