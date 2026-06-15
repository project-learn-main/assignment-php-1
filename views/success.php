<section class="py-32 flex items-center" style="background: linear-gradient(135deg, var(--light-bg) 0%, #f5f0eb 100%); min-height: 100vh;">
    <div class="max-w-2xl mx-auto px-4 w-full">
        <div class="text-center">
            <!-- Checkmark Circle -->
            <div class="mb-8 flex justify-center">
                <div class="checkmark-circle" style="
                        width: 100px;
                        height: 100px;
                        border: 4px solid var(--accent);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    ">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 30L25 40L45 20" stroke="#d4956e" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

            <!-- Main Message -->
            <h1 class="text-5xl font-bold mb-4 slide-down" style="color: var(--primary);">
                Cảm Ơn Bạn!
            </h1>
            <p class="text-2xl mb-4 slide-down" style="color: var(--accent); animation-delay: 0.1s;">
                Đơn hàng của bạn đã được xác nhận
            </p>

            <!-- Order Details -->
            <div class="bg-white rounded-lg p-8 mb-8 mt-12 border slide-down" style="border-color: var(--border-light); animation-delay: 0.2s;">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                    <div>
                        <p class="text-sm text-gray-600">Mã Đơn Hàng</p>
                        <p class="text-2xl font-bold" style="color: var(--primary);">
                            #<span id="orderNumber"></span>
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Ngày Đặt Hàng</p>
                        <p class="text-2xl font-bold" style="color: var(--primary);">
                            <span id="orderDate"></span>
                        </p>
                    </div>
                </div>

                <div style="border-top: 1px solid var(--border-light); padding-top: 16px;">
                    <div class="text-left">
                        <p class="text-sm font-bold mb-4" style="color: var(--primary);">Chi Tiết Đơn Hàng:</p>
                        <div id="orderItems" class="space-y-3 mb-6"></div>
                        <div style="border-top: 1px solid var(--border-light); padding-top: 12px;">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Tạm tính:</span>
                                <span id="orderSubtotal" style="color: var(--primary);"></span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Thuế:</span>
                                <span id="orderTax" style="color: var(--primary);"></span>
                            </div>
                            <div class="flex justify-between font-bold text-lg mt-4">
                                <span style="color: var(--primary);">Tổng Cộng:</span>
                                <span id="orderTotal" style="color: var(--accent);"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information -->
            <div class="bg-blue-50 rounded-lg p-6 mb-8" style="border-left: 4px solid #60a5fa;">
                <p class="text-sm" style="color: #1e40af;">
                    <strong>ℹ️ Thông tin giao hàng:</strong> Chúng tôi sẽ gửi email xác nhận chi tiết giao hàng sớm. Bạn có thể theo dõi đơn hàng tại trang tài khoản của bạn.
                </p>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col gap-4">
                <a href="?page=products" class="py-4 text-white text-lg font-bold rounded no-underline transition-all duration-300 text-center" style="background-color: var(--primary);">
                    Tiếp Tục Mua Sắm
                </a>
                <a href="?page=home" class="py-4 text-lg font-bold rounded border no-underline transition-all duration-300 text-center" style="border-color: var(--border-light); color: var(--primary);">
                    Quay Lại Trang Chủ
                </a>
            </div>
        </div>
    </div>
</section>