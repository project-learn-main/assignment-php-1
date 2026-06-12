<?php
include_once('models/product.php');
class HomeController
{
    public function Render()
    {
        $productsByCategory = getProductByCategory();
        include('views/home.php');
    }
}
