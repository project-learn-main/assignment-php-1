<?php
include_once __DIR__ . '/../../models/category.php';
class CategoryController
{
    public function Render()
    {
        $data = getAllCategory();
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