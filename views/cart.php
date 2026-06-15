<div class="container mx-auto py-10">

    <h1 class="text-3xl font-bold mb-8">🛒 Giỏ hàng</h1>
    <?php if (empty($items)) : ?>

        <!-- Giỏ hàng trống -->
        <div class="text-center py-20">

            <div style="font-size:80px;">🛒</div>

            <h2 class="text-2xl font-bold mt-4 mb-3">
                Giỏ hàng trống
            </h2>

            <p class="mb-6">
                Hãy thêm một số sản phẩm để bắt đầu mua sắm.
            </p>

            <a href="?page=products"
                class="px-5 py-3 rounded text-white"
                style="background:#2d6a4f;">
                Tiếp tục mua sắm
            </a>
        </div>

    <?php else : ?>

        <?php
        $subtotal = 0;

        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $tax = 0;
        $shipping = 0;
        $total = $subtotal + $tax + $shipping;
        ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Danh sách sản phẩm -->
            <div class="lg:col-span-2">

                <?php foreach ($items as $item) : ?>

                    <div class="border rounded p-4 mb-4 flex gap-4">

                        <div>
                            <img
                                src="<?= htmlspecialchars($item['image']) ?>"
                                alt="<?= htmlspecialchars($item['name']) ?>"
                                style="width:120px;height:120px;object-fit:cover;">
                        </div>

                        <div class="flex-1">

                            <h3 class="text-xl font-bold">
                                <?= htmlspecialchars($item['name']) ?>
                            </h3>

                            <p class="mt-2">
                                Giá:
                                <strong>
                                    <?= number_format($item['price'], 0, ',', '.') ?>₫
                                </strong>
                            </p>

                            <p>
                                Số lượng:
                                <?= (int)$item['quantity'] ?>
                            </p>

                            <p class="mt-2">
                                Thành tiền:
                                <strong>
                                    <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>₫
                                </strong>
                            </p>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

            <!-- Tóm tắt -->
            <div class="border rounded p-6 h-fit">

                <h2 class="text-2xl font-bold mb-6">
                    Tóm tắt đơn hàng
                </h2>

                <div class="flex justify-between mb-3">
                    <span>Tạm tính</span>
                    <strong>
                        <?= number_format($subtotal, 0, ',', '.') ?>₫
                    </strong>
                </div>

                <div class="flex justify-between mb-3">
                    <span>Vận chuyển</span>
                    <strong>Miễn phí</strong>
                </div>

                <div class="flex justify-between mb-3">
                    <span>Thuế</span>
                    <strong>
                        <?= number_format($tax, 0, ',', '.') ?>₫
                    </strong>
                </div>

                <hr class="my-4">

                <div class="flex justify-between text-xl font-bold mb-6">
                    <span>Tổng cộng</span>
                    <span>
                        <?= number_format($total, 0, ',', '.') ?>₫
                    </span>
                </div>

                <a
                    href="?page=checkout"
                    class="block w-full text-center text-white py-3 rounded mb-3"
                    style="background:#2d6a4f;">
                    Thanh toán
                </a>

                <a
                    href="?page=products"
                    class="block w-full text-center py-3 rounded border">
                    Tiếp tục mua sắm
                </a>

            </div>

        </div>

    <?php endif; ?>

</div>