<?php
include_once 'models/product.php';
class ProductsController
{

    public function Render()
    {
        $productsByCategory = getProductByCategory();
        include('views/products.php');
    }
}
