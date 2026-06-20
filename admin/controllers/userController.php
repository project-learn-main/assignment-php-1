<?php
include '../models/user.php';

class UserController
{
    public function Render()
    {
       $limit = 5; // Số người dùng trên một trang
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;

        $offset = ($currentPage - 1) * $limit;
        $totalUsers = getTotalUserCount();
        $totalPages = ceil($totalUsers / $limit);

        // Gọi dữ liệu phân trang từ Model
        $data = getUsersPagination($limit, $offset);

        include('views/user.php');
    }
}
