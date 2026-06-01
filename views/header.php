<!doctype html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ShopHub - Mua Sắm Trực Tuyến</title>
    <link href="./assets/css/styles.css" rel="stylesheet" />
    <link href="./assets/css/output.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="sticky top-0 z-100 bg-white shadow-sm" >
         <div class="container-custom flex justify-between items-center p-4">
            <div class="flex items-center gap-8">
                <a href="?page=home" class="text-2xl font-bold" style="color: var(--primary);">
                    ShopHub
                </a>
                <div class="hidden md:flex gap-6">
                    <a href="?page=home" class="text-sm font-medium">
                        Trang chủ
                    </a>
                    <a href="?page=products" class="text-sm font-medium">
                        Sản phẩm
                    </a>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a href="?page=cart" class="relative" style="text-decoration: none;">
                    <span style="font-size: 24px;">🛒</span>
                    <span data-cart-badge class="absolute -top-2 -right-2 bg-accent text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                        <!-- ${store.getCartCount()} -->
                         3
                    </span>
                </a>
                    <div class="flex items-center gap-2">
                        <span class="text-sm">Xin chào, ${user.name}</span>
                        <button onclick="logoutAndRedirect()" class="btn-secondary">Đăng xuất</button>
                    </div>
                    <div class="flex gap-2">
                        <a href="?page=login" class="btn-secondary" style="text-decoration: none;">
                            Đăng nhập
                        </a>
                        <a href="?page=register" class="btn-primary" style="text-decoration: none;">
                            Đăng ký
                        </a>
                    </div>
            </div>
        </div>
    </nav>