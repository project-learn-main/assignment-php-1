<?php
class ProductsController {
    public function initProducts() {
        return [
            [
                "id" => 1,
                "name" => 'Áo thun nam cơ bản',
                "price" => 199000,
                "description" => 'Áo thun nam chất lượng cao, thoáng mát',
                "emoji" => '👕'
            ],  
            [
                "id" => 2,
                "name" => 'Quần jeans xanh đậm',
                "price" => 499000,
                "description" => 'Quần jeans kinh điển, bền bỉ',
                "emoji" => '👖'
            ],
            [
                "id" => 3,
                "name" => 'Giày thể thao',
                "price" => 899000,
                "description" => 'Giày thể thao năng động, thoải mái',
                "emoji" => '👟'
            ],
            [
                "id" => 4,
                "name" => 'Mũ snapback',
                "price" => 299000,
                "description" => 'Mũ snapback phong cách, chất liệu tốt',
                "emoji" => '🧢'
            ],
            [
                "id" => 5,
                "name" => 'Áo khoác bomber',
                "price" => 699000,
                "description" => 'Áo khoác bomber hiện đại',
                "emoji" => '🧥'
            ],
            [
                "id" => 6,
                "name" => 'Quần short thể thao',
                "price" => 299000,
                "description" => 'Quần short thoáng mát, lý tưởng cho thể thao',
                "emoji" => '🩳'
            ],
            [
                "id" => 7,
                "name" => 'Ba lô du lịch',
                "price" => 799000,
                "description" => 'Ba lô rộng rãi, chất lượng cao',
                "emoji" => '🎒'
            ],
            [
                "id" => 8,
                "name" => 'Tất vớ nam',
                "price" => 79000,
                "description" => 'Bộ 3 đôi tất vớ nam chất lượng',
                "emoji" => '🧦'
            ]
        ];
    }
    public function Render() {
        include('views/products.php');
    }
}
?>
