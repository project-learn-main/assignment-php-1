<?php
include '../models/product.php';

class ProductController
{
    public function Render()
    {
        $data = getAllProduct();
        include('views/product.php');
    }
}
