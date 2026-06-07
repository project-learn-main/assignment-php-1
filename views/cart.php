 <div class="max-w-6xl mx-auto px-4 py-4">
     <p class="text-gray-500">
         <a href="../index.html" class="no-underline" style="color: var(--accent);">Trang chủ</a>
         <span class="text-gray-500"> / </span>
         <span style="color: var(--primary);">Giỏ Hàng</span>
     </p>
 </div>
 <section class="py-12">
     <div class="max-w-6xl mx-auto px-4">
         <h1 class="text-4xl font-bold mb-12" style="color: var(--primary);">Giỏ Hàng Của Bạn</h1>

         <div id="emptyCart" class="text-center py-20">
             <div style="font-size: 80px; margin-bottom: 16px;">🛒</div>
             <h2 class="text-2xl font-bold mb-4" style="color: var(--primary);">Giỏ hàng trống</h2>
             <p class="text-lg mb-8 text-gray-600">Hãy thêm một số sản phẩm để bắt đầu mua sắm</p>
             <a href="?page=products" class="inline-block px-6 py-3 text-white rounded no-underline transition-all duration-300" style="background-color: var(--primary);">
                 Tiếp Tục Mua Sắm →
             </a>
         </div>

         <div id="cartContent" style="display: none;">
             <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                 <!-- Cart Items -->
                 <div class="lg:col-span-2">
                     <div id="cartItems"></div>
                 </div>

                 <!-- Cart Summary -->
                 <div class="bg-white rounded-lg p-8 border" style="border-color: var(--border-light); height: fit-content;">
                     <h2 class="text-2xl font-bold mb-6" style="color: var(--primary);">Tóm Tắt Đơn Hàng</h2>

                     <div class="mb-6 pb-6" style="border-bottom: 1px solid var(--border-light);">
                         <div class="flex justify-between mb-4">
                             <span class="text-gray-600">Tạm tính:</span>
                             <span id="subtotal" class="font-bold" style="color: var(--primary);">0₫</span>
                         </div>
                         <div class="flex justify-between mb-4">
                             <span class="text-gray-600">Vận chuyển:</span>
                             <span id="shipping" class="font-bold text-green-600">Miễn phí</span>
                         </div>
                         <div class="flex justify-between mb-4">
                             <span class="text-gray-600">Thuế:</span>
                             <span id="tax" class="font-bold" style="color: var(--primary);">0₫</span>
                         </div>
                     </div>

                     <div class="flex justify-between mb-8">
                         <span class="text-lg font-bold" style="color: var(--primary);">Tổng cộng:</span>
                         <span id="total" class="text-2xl font-bold" style="color: var(--accent);">0₫</span>
                     </div>

                     <button onclick="proceedToCheckout()" class="w-full py-4 text-lg text-white rounded transition-all duration-300 mb-4" style="background-color: var(--primary);">
                         Tiếp Tục Thanh Toán
                     </button>
                     <a href="?page=products" class="block w-full py-4 text-center rounded border no-underline transition-all duration-300" style="border-color: var(--border-light); color: var(--primary);">
                         Tiếp Tục Mua Sắm
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </section>