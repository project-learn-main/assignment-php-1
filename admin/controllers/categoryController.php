<?php
include '../models/category.php';
class CategoryController
{
    public function Render()
    {
        $data = getAllCategory();
        // var_dump("🚀 ~ CategoryController ~ Render ~ $data:", $data);
        include('views/category.php');
    }
}
