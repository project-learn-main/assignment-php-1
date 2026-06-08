<?php
include '../models/product.php';
include '../models/category.php';

class ProductController
{
    public function Render()
    {
        $data = getAllProduct();
        $categories = getAllCategory();
        include('views/product.php');
    }
}
