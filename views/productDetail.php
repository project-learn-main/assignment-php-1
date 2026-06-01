   <!-- Breadcrumb -->
    <div class="max-w-6xl mx-auto px-4 py-4">
        <p class="text-gray-500">
            <a href="../index.html" class="no-underline" style="color: var(--accent);">Trang chủ</a>
            <span class="text-gray-500"> / </span>
            <a href="products.html" class="no-underline" style="color: var(--accent);">Sản phẩm</a>
            <span class="text-gray-500"> / </span>
            <span id="breadcrumbName" style="color: var(--primary);"></span>
        </p>
    </div>
   <!-- Product Detail -->
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Image -->
                <div>
                    <div class="bg-white rounded-lg overflow-hidden border" style="border-color: var(--border-light);">
                        <div class="w-full flex items-center justify-center" id="productImage" style="background-color: var(--light-bg); font-size: 200px; height: 400px;"></div>
                    </div>
                </div>

                <!-- Details -->
                <div>
                    <h1 id="productName" class="text-4xl font-bold mb-4" style="color: var(--primary);"></h1>
                    <p id="productDescription" class="text-lg mb-8 text-gray-600"></p>

                    <!-- Price -->
                    <div class="mb-8 pb-8" style="border-bottom: 1px solid var(--border-light);">
                        <span class="text-3xl font-bold" id="productPrice" style="color: var(--accent);"></span>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-8">
                        <label class="block text-sm font-bold mb-4" style="color: var(--primary);">Số Lượng:</label>
                        <div class="flex items-center gap-4">
                            <button onclick="decreaseQuantity()" class="w-10 h-10 flex items-center justify-center rounded border transition-all duration-300" style="border-color: var(--border-light); color: var(--primary);">−</button>
                            <input type="number" id="quantity" value="1" min="1" class="w-20 px-4 py-2 border rounded text-center" style="border-color: var(--border-light);">
                            <button onclick="increaseQuantity()" class="w-10 h-10 flex items-center justify-center rounded border transition-all duration-300" style="border-color: var(--border-light); color: var(--primary);">+</button>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <button onclick="addToCartDetail()" class="flex-1 py-4 text-lg text-white rounded transition-all duration-300" style="background-color: var(--primary);">
                            Thêm Vào Giỏ Hàng
                        </button>
                        <a href="cart.html" class="flex-1 py-4 text-lg text-center rounded border no-underline transition-all duration-300" style="border-color: var(--border-light); color: var(--primary);">
                            Xem Giỏ Hàng
                        </a>
                    </div>

                    <!-- Info -->
                    <div class="mt-12 pt-8" style="border-top: 1px solid var(--border-light);">
                        <h3 class="text-lg font-bold mb-6" style="color: var(--primary);">Thông Tin Sản Phẩm</h3>
                        <ul class="space-y-4 text-sm text-gray-600">
                            <li><strong>Kho hàng:</strong> <span class="text-green-600 ml-2">Còn hàng</span></li>
                            <li><strong>Giao hàng:</strong> Miễn phí cho đơn từ 200K</li>
                            <li><strong>Trả hàng:</strong> 30 ngày hoàn tiền nếu không hài lòng</li>
                            <li><strong>Bảo hành:</strong> Bảo hành chất lượng sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="py-12" style="background-color: white; margin-top: 40px;">
        <div class="container-custom">
            <h2 class="text-3xl font-bold mb-8" style="color: var(--primary);">Sản Phẩm Liên Quan</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6" id="relatedProducts"></div>
        </div>
    </section>