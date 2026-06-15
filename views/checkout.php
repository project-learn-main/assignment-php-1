```php
<div class="max-w-5xl mx-auto py-10 px-4">

    <h1 class="text-3xl font-bold mb-8">
        Thanh toán
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Thông tin giao hàng -->
        <div class="border rounded-lg p-6">

            <h2 class="text-xl font-bold mb-4">
                Thông tin giao hàng
            </h2>

            <form action="?page=checkout&action=placeOrder" method="POST">

                <div class="mb-4">
                    <label>Họ và tên</label>
                    <input
                        type="text"
                        name="fullname"
                        class="w-full border rounded p-2"
                        required>
                </div>

                <div class="mb-4">
                    <label>Số điện thoại</label>
                    <input
                        type="text"
                        name="phone"
                        class="w-full border rounded p-2"
                        required>
                </div>

                <div class="mb-4">
                    <label>Địa chỉ giao hàng</label>
                    <textarea
                        name="address"
                        class="w-full border rounded p-2"
                        rows="3"
                        required></textarea>
                </div>

                <div class="mb-4">
                    <label>Phương thức thanh toán</label>

                    <select
                        name="payment_method"
                        class="w-full border rounded p-2">

                        <option value="COD">
                            Thanh toán khi nhận hàng (COD)
                        </option>

                        <option value="BANK">
                            Chuyển khoản
                        </option>

                    </select>
                </div>

                <button
                    type="submit"
                    class="w-full bg-green-600 text-white py-3 rounded">
                    Đặt hàng
                </button>

            </form>

        </div>

        <!-- Tóm tắt đơn hàng -->
        <div class="border rounded-lg p-6">

            <h2 class="text-xl font-bold mb-4">
                Đơn hàng của bạn
            </h2>

            <?php
            $total = 0;

            if (!empty($items)):
                foreach ($items as $item):
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
            ?>

                <div class="flex justify-between mb-3">
                    <span>
                        <?= htmlspecialchars($item['name']) ?>
                        x <?= $item['quantity'] ?>
                    </span>

                    <span>
                        <?= number_format($subtotal, 0, ',', '.') ?>₫
                    </span>
                </div>

            <?php
                endforeach;
            endif;
            ?>

            <hr class="my-4">

            <div class="flex justify-between text-xl font-bold">
                <span>Tổng cộng</span>

                <span>
                    <?= number_format($total, 0, ',', '.') ?>₫
                </span>
            </div>

            <a
                href="?page=cart"
                class="block text-center mt-6 border rounded py-2">
                Quay lại giỏ hàng
            </a>

        </div>

    </div>

</div>
```
