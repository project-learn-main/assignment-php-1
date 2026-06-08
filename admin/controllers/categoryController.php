<?php
include '../models/category.php';
class CategoryController
{
    public function Render()
    {
        $data = getAllCategory();
        include('views/category.php');
    }
}
