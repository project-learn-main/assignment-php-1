  <!-- Breadcrumb -->
    <div class="max-w-6xl mx-auto px-4 py-4">
        <p class="text-gray-500">
            <a href="../index.html" class="no-underline" style="color: var(--accent);">Trang chủ</a>
            <span class="text-gray-500"> / </span>
            <a href="cart.html" class="no-underline" style="color: var(--accent);">Giỏ hàng</a>
            <span class="text-gray-500"> / </span>
            <span style="color: var(--primary);">Thanh toán</span>
        </p>
    </div>

    <!-- Checkout Section -->
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-12" style="color: var(--primary);">Thanh Toán</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Form -->
                <div class="lg:col-span-2">
                    <!-- Shipping Info -->
                    <div class="bg-white rounded-lg p-8 mb-8 border" style="border-color: var(--border-light);">
                        <h2 class="text-2xl font-bold mb-6" style="color: var(--primary);">Thông Tin Giao Hàng</h2>
                        
                        <form id="checkoutForm">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Họ Tên</label>
                                    <input type="text" class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" style="border-color: var(--border-light);" id="fullname" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Số Điện Thoại</label>
                                    <input type="tel" class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" style="border-color: var(--border-light);" id="phone" required>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Email</label>
                                <input type="email" class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" style="border-color: var(--border-light);" id="email" required>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Địa Chỉ</label>
                                <input type="text" class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" style="border-color: var(--border-light);" id="address" placeholder="Đường, số nhà" required>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                                <div>
                                    <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Thành Phố</label>
                                    <input type="text" class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" style="border-color: var(--border-light);" id="city" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Quận/Huyện</label>
                                    <input type="text" class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" style="border-color: var(--border-light);" id="district" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-2" style="color: var(--primary);">Mã Zip</label>
                                    <input type="text" class="w-full px-4 py-3 border rounded transition-all duration-300 focus:outline-none" style="border-color: var(--border-light);" id="zip" required>
                                </div>
                            </div>

                            <div style="border-top: 1px solid var(--border-light); padding-top: 24px;">
                                <h3 class="text-xl font-bold mb-6" style="color: var(--primary);">Phương Thức Thanh Toán</h3>
                                
                                <label class="flex items-center gap-4 mb-4">
                                    <input type="radio" name="payment" value="cod" checked style="width: 20px; height: 20px;">
                                    <span class="font-bold" style="color: var(--primary);">Thanh Toán Khi Nhận Hàng (COD)</span>
                                </label>

                                <label class="flex items-center gap-4 mb-4">
                                    <input type="radio" name="payment" value="card" style="width: 20px; height: 20px;">
                                    <span class="font-bold" style="color: var(--primary);">Thẻ Tín Dụng / Thẻ Ghi Nợ</span>
                                </label>

                                <label class="flex items-center gap-4">
                                    <input type="radio" name="payment" value="bank" style="width: 20px; height: 20px;">
                                    <span class="font-bold" style="color: var(--primary);">Chuyển Khoản Ngân Hàng</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="bg-white rounded-lg p-8 border h-fit" style="border-color: var(--border-light);">
                    <h2 class="text-2xl font-bold mb-6" style="color: var(--primary);">Tóm Tắt Đơn Hàng</h2>
                    
                    <div id="checkoutItems" class="mb-6 pb-6" style="border-bottom: 1px solid var(--border-light);"></div>

                    <div class="mb-6 pb-6" style="border-bottom: 1px solid var(--border-light);">
                        <div class="flex justify-between mb-4">
                            <span class="text-gray-600">Tạm tính:</span>
                            <span id="checkoutSubtotal" style="color: var(--primary); font-bold;">0₫</span>
                        </div>
                        <div class="flex justify-between mb-4">
                            <span class="text-gray-600">Vận chuyển:</span>
                            <span class="font-bold text-green-600">Miễn phí</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Thuế:</span>
                            <span id="checkoutTax" style="color: var(--primary); font-bold;">0₫</span>
                        </div>
                    </div>

                    <div class="flex justify-between mb-8">
                        <span class="text-lg font-bold" style="color: var(--primary);">Tổng Cộng:</span>
                        <span id="checkoutTotal" class="text-2xl font-bold" style="color: var(--accent);">0₫</span>
                    </div>

                    <button onclick="handleCheckout()" class="w-full py-4 text-lg text-white rounded transition-all duration-300" style="background-color: var(--primary);">
                        Hoàn Thành Đơn Hàng
                    </button>
                    <a href="cart.html" class="block w-full py-3 text-center mt-4 rounded border no-underline transition-all duration-300" style="border-color: var(--border-light); color: var(--primary);">
                        Quay Lại Giỏ Hàng
                    </a>
                </div>
            </div>
        </div>
    </section>