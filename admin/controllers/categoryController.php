<?php
include_once __DIR__ . '/../../models/category.php';
class CategoryController
{
    public function Render()
    {
      // 1. Số lượng danh mục hiển thị trên mỗi trang
        $limit = 5;

        // 2. Lấy số trang hiện tại từ URL (Ví dụ: ?tab=category&page=2), mặc định là trang 1
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) {
            $currentPage = 1;
        }

        // 3. Tính toán vị trí bắt đầu bốc dữ liệu (Offset)
        $offset = ($currentPage - 1) * $limit;

        // 4. Lấy tổng số lượng danh mục và tính tổng số trang cần có
        $totalCategories = getTotalCategoryCount();
        $totalPages = ceil($totalCategories / $limit);

        // 5. Lấy dữ liệu phân trang thay vì lấy hết như trước
        $data = getCategoriesPagination($limit, $offset);

        // 6. Nhúng file giao diện hiển thị (View sẽ nhận được các biến $data, $currentPage, $totalPages)
        include 'views/category.php';
    }

    public function Create()
    {
        if (isset($_POST['name']) && isset($_POST['description'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $user = $_SESSION['admin_id'];

            if (createCategory($name, $description, $user)) {
                setcookie('category_add_success', 'true', time() + 10, "/");
            } else {
                setcookie('category_add_error', 'true', time() + 10, "/");
            }

            header("Location: index.php?tab=category");
            exit();
        }
    }

    public function Update()
    {
        var_dump($_POST);
        if (!empty($_POST['id'])) {
           $result =  updateCategory(
                $_POST['id'],
                $_POST['name'],
                $_POST['description']
            );
            if ($result) {
                setcookie('category_update_success', 'true', time() + 10, "/");
            } else {
                setcookie('category_update_error', 'true', time() + 10, "/");
            }

            header("Location: index.php?tab=category");
            exit();
        } 
    }

    public function Delete()
    {
        if (!empty($_POST['id'])) {
            $result = deleteCategory($_POST['id']);
            
            if ($result) {
                setcookie('category_delete_success', 'true', time() + 10, "/");
            } else {
                setcookie('category_delete_error', 'true', time() + 10, "/");
            }
            header("Location: index.php?tab=category");
        }
    }

}