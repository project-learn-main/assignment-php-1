<div class="max-w-5xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-8" style="color: var(--primary);">
        Thanh toán
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Danh sách sản phẩm -->
        <div class="lg:col-span-2 bg-white rounded-lg border p-6">

            <h2 class="text-xl font-bold mb-6" style="color: var(--primary);">
                Sản phẩm trong đơn hàng
            </h2>

            <?php
            $total = 0;

            if (!empty($items)):
                foreach ($items as $item):

                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
            ?>

                    <div class="flex justify-between items-center py-4 border-b">

                        <div class="flex items-center gap-4">

                            <img
                                src="<?= $item['image'] ?>"
                                alt="<?= htmlspecialchars($item['name']) ?>"
                                class="w-20 h-20 object-cover rounded">

                            <div>
                                <h3 class="font-bold">
                                    <?= htmlspecialchars($item['name']) ?>
                                </h3>

                                <p class="text-gray-500">
                                    Số lượng: <?= $item['quantity'] ?>
                                </p>
                            </div>

                        </div>

                        <div class="font-bold">
                            <?= number_format($subtotal, 0, ',', '.') ?> ₫
                        </div>

                    </div>

            <?php
                endforeach;
            else:
            ?>

                <p>Không có sản phẩm.</p>

            <?php endif; ?>

        </div>

        <!-- Tóm tắt -->
        <div class="bg-white rounded-lg border p-6 h-fit">

            <h2 class="text-xl font-bold mb-6" style="color: var(--primary);">
                Tóm tắt đơn hàng
            </h2>

            <div class="flex justify-between mb-4">
                <span>Tạm tính</span>

                <span class="font-bold">
                    <?= number_format($total, 0, ',', '.') ?> ₫
                </span>
            </div>

            <div class="flex justify-between mb-4">
                <span>Phí vận chuyển</span>

                <span class="text-green-600">
                    Miễn phí
                </span>
            </div>

            <hr class="my-4">

            <div class="flex justify-between text-xl font-bold mb-6">

                <span>Tổng cộng</span>

                <span style="color: var(--accent);">
                    <?= number_format($total, 0, ',', '.') ?> ₫
                </span>

            </div>

            <form action="?page=checkout&action=placeOrder" method="POST">

                <button
                    type="submit"
                    class="w-full py-3 rounded text-white"
                    style="background-color: var(--primary);">

                    Xác nhận thanh toán

                </button>

            </form>

            <a
                href="?page=cart"
                class="block text-center mt-4 py-3 border rounded no-underline"
                style="color: var(--primary);">

                ← Quay lại giỏ hàng

            </a>

        </div>

    </div>

</div>