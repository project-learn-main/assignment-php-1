<div class="max-w-5xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-8" style="color: var(--primary);">
        Thanh toán
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 bg-white rounded-lg border p-6">
            <h2 class="text-xl font-bold mb-4" style="color: var(--primary);">
                Thông tin giao hàng
            </h2>
            
            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded mb-6">
                <p class="text-sm text-blue-700">
                    <strong>💡 Lưu ý:</strong> Đơn hàng sẽ được xử lý và giao tới thông tin (Họ tên, số điện thoại, địa chỉ) đã đăng ký trên tài khoản của bạn: 
                    <strong class="block mt-1 text-blue-900"><?= isset($_SESSION['fullname']) ? htmlspecialchars($_SESSION['fullname']) : 'Tài khoản của bạn' ?></strong>
                </p>
            </div>

            <p class="text-gray-500 italic text-sm">Vui lòng kiểm tra kỹ số tiền tổng cộng ở cột bên phải trước khi xác nhận đặt hàng.</p>
        </div>

        <div class="bg-white rounded-lg border p-6 h-fit">

            <h2 class="text-xl font-bold mb-6" style="color: var(--primary);">
                Tóm tắt đơn hàng
            </h2>

            <?php
            $total = 0;
            // Chắc chắn $items thu được từ Controller là một mảng và không trống
            if (isset($items) && is_array($items) && !empty($items)) {
                foreach ($items as $item) {
                    $subtotal = (float)$item['price'] * (int)$item['quantity'];
                    $total += $subtotal;
                }
            }
            ?>

            <div class="flex justify-between mb-4">
                <span>Tạm tính</span>
                <span class="font-bold">
                    <?= number_format($total, 0, ',', '.') ?> ₫
                </span>
            </div>

            <div class="flex justify-between mb-4">
                <span>Phí vận chuyển</span>
                <span class="text-green-600 font-medium">Miễn phí</span>
            </div>

            <hr class="my-4" style="border-color: var(--border-light);">

            <div class="flex justify-between text-xl font-bold mb-6">
                <span>Tổng cộng</span>
                <span style="color: var(--accent);">
                    <?= number_format($total, 0, ',', '.') ?> ₫
                </span>
            </div>

            <form action="index.php?page=checkout&action=placeOrder" method="POST">
                <button
                    type="submit"
                    class="w-full py-3 rounded text-white font-bold text-center block transition-all duration-300 hover:opacity-90"
                    style="background-color: var(--primary);">
                    Xác nhận thanh toán
                </button>
            </form>

            <a href="index.php?page=cart" class="block text-center mt-4 py-3 border rounded no-underline" style="color: var(--primary); border-color: var(--border-light);">
                ← Quay lại giỏ hàng
            </a>

        </div>

    </div>
</div>