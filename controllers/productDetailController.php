<?php
include_once 'models/product.php';
class ProductDetailController
{
    public function Render()
    {
        $id = $_GET['id'] ?? 0;

        $product = getProductById($id);
        include('views/productDetail.php');
    }
}
