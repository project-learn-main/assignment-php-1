<!-- Hero Section -->
<section
  class="py-20"
  style="
        background: linear-gradient(135deg, var(--light-bg) 0%, #f5f0eb 100%);
      ">
  <div class="max-w-6xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div>
        <h1 class="text-5xl font-bold mb-6" style="color: var(--primary)">
          Mua Sắm Thông Minh, Giá Tốt Nhất
        </h1>
        <p class="text-lg mb-8 text-gray-600">
          Khám phá bộ sưu tập quần áo và phụ kiện thời trang chất lượng cao
          với giá cạnh tranh.
        </p>
        <a
          href="?page=products"
          class="inline-block px-6 py-3 text-white rounded-lg transition-all duration-300 hover:shadow-lg bg-(--primary) hover:bg-white">
          Xem Sản Phẩm →
        </a>
      </div>
      <div class="text-center" style="font-size: 120px">🛍️</div>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="py-16">
  <div class="max-w-6xl mx-auto px-4">
    <h2
      class="text-3xl font-bold mb-12 text-center"
      style="color: var(--primary)">
      Tại Sao Chọn ShopHub?
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div
        class="bg-white p-8 rounded-lg border"
        style="border-color: var(--border-light)">
        <div style="font-size: 48px; margin-bottom: 16px">🚚</div>
        <h3 class="text-xl font-bold mb-4" style="color: var(--primary)">
          Giao Hàng Nhanh
        </h3>
        <p class="text-gray-600">
          Giao hàng miễn phí cho đơn từ 200.000đ trở lên
        </p>
      </div>
      <div
        class="bg-white p-8 rounded-lg border"
        style="border-color: var(--border-light)">
        <div style="font-size: 48px; margin-bottom: 16px">💎</div>
        <h3 class="text-xl font-bold mb-4" style="color: var(--primary)">
          Chất Lượng Cao
        </h3>
        <p class="text-gray-600">
          Sản phẩm được kiểm định chất lượng kỹ lưỡng
        </p>
      </div>
      <div
        class="bg-white p-8 rounded-lg border"
        style="border-color: var(--border-light)">
        <div style="font-size: 48px; margin-bottom: 16px">🔒</div>
        <h3 class="text-xl font-bold mb-4" style="color: var(--primary)">
          Thanh Toán An Toàn
        </h3>
        <p class="text-gray-600">Bảo mật thông tin thanh toán 100%</p>
      </div>
    </div>
  </div>
</section>

<!-- Best Sellers -->
<!-- Products By Category -->
<?php foreach ($productsByCategory as $category => $products): ?>
  <section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl font-bold mb-12" style="color: var(--primary)">
        <?= $category ?>
      </h2>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <?php foreach ($products as $product): ?>
          <div
            class="bg-white rounded-lg overflow-hidden border transition-all duration-300 hover:shadow-lg hover:-translate-y-1"
            style="border-color: var(--border-light)">

            <div class="w-full h-60 flex items-center justify-center"
              style="background-color: var(--light-bg);">

              <img
                src="admin/images/<?= $product['image'] ?>"
                alt="<?= $product['name'] ?>"
                class="w-full h-full object-cover">
            </div>

            <div class="p-4">
              <h3 class="font-bold mb-2" style="color: var(--primary)">
                <?= $product['name'] ?>
              </h3>

              <p class="text-sm mb-4 text-gray-500">
                <?= $product['description'] ?>
              </p>

              <div class="flex gap-2 justify-between items-center">
                <span class="font-bold" style="color: var(--accent)">
                  <?= number_format($product['price']) ?>₫
                </span>

                <a
                  href="?page=product-detail&&id=<?= $product['id'] ?>"
                  class="px-4 py-2 text-white rounded text-sm transition-all duration-300"
                  style="background-color: var(--primary); font-size: 12px">
                  Xem chi tiết
                </a>
              </div>

            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>
<?php endforeach; ?>