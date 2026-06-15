<!-- Breadcrumb -->
<div class="max-w-6xl mx-auto px-4 py-4">
    <p class="text-gray-500">
        <a href="?page=home" class="no-underline" style="color: var(--accent);">Trang chủ</a>
        <span class="text-gray-500"> / </span>
        <a href="?page=products" class="no-underline" style="color: var(--accent);">Sản phẩm</a>
        <span class="text-gray-500"> / </span>
        <span id="breadcrumbName" style="color: var(--primary);">Chi tiết sản phẩm</span>
    </p>
</div>

<div class="container mx-auto py-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- Hình ảnh sản phẩm -->
        <div>
            <img
                src="<?= 'admin/images/' . $product['image'] ?>"
                alt="<?= htmlspecialchars($product['name']) ?>"
                class="w-full flex items-center justify-center" id="productImage" 
                style="background-color: var(--light-bg); font-size: 200px; height: 400px;"
            >
        </div>

        <!-- Thông tin sản phẩm -->
        <div>

            <h1 class="text-4xl font-bold mb-4" style="color: var(--primary);">
                <?= htmlspecialchars($product['name']) ?>
            </h1>

            <p class="text-lg text-gray-600 mb-6">
                <?= htmlspecialchars($product['description']) ?>
            </p>

            <!-- Giá -->
            <div class="mb-6">
                <span class="text-3xl font-bold" style="color: var(--accent);">
                    <?= number_format($product['price'], 0, ',', '.') ?>₫
                </span>
            </div>

            <!-- Số lượng -->
            <form action="?page=cart&action=add&id=<?= $product['id'] ?>" method="POST">

                <input
                    type="hidden"
                    name="product_id"
                    value="<?= $product['id'] ?>">

                <label class="block font-bold mb-2">
                    Số lượng
                </label>

                <input
                    type="number"
                    name="quantity"
                    value="1"
                    min="1"
                    max="<?= (int)$product['stock'] ?>"
                    class="border rounded px-3 py-2 w-24 mb-6">

                    <button
                        type="submit"
                        class="w-full py-3 text-white rounded"
                        style="background-color: var(--primary);">
                        🛒 Thêm vào giỏ hàng
                    </button>
            </form>

            <!-- Thông tin bổ sung -->
            <div class="mt-8 border-t pt-6">

                <h3 class="font-bold text-lg mb-3">
                    Thông tin sản phẩm
                </h3>

                <ul class="space-y-2">
                    <li>
                        <strong>Tồn kho:</strong>
                        <?= (int)$product['stock'] ?> sản phẩm
                    </li>

                    <li>
                        <strong>Giao hàng:</strong>
                        Miễn phí cho đơn từ 200.000₫
                    </li>

                    <li>
                        <strong>Đổi trả:</strong>
                        Hỗ trợ đổi trả theo chính sách của cửa hàng.
                    </li>
                </ul>

            </div>

        </div>
    </div>

</div>