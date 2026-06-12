<!-- Breadcrumb -->
<div class="max-w-6xl mx-auto px-4 py-6">
    <div class="flex items-center text-sm">
        <a href="?page=home"
            class="hover:underline"
            style="color: var(--accent);">
            Trang chủ
        </a>

        <span class="mx-2 text-gray-400">/</span>

        <span class="font-medium"
            style="color: var(--primary);">
            Sản phẩm
        </span>
    </div>
</div>

<section class="pb-16">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Header + Filter -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">

            <h1 class="text-4xl font-bold mb-4 md:mb-0"
                style="color: var(--primary);">
                Tất Cả Sản Phẩm
            </h1>

            <select
                id="categoryFilter"
                onchange="filterCategory(this.value)"
                class="border rounded-lg px-5 py-3 outline-none shadow-sm"
                style="border-color: var(--border-light); color: var(--primary);">

                <option value="all">📦 Tất cả danh mục</option>

                <?php foreach ($productsByCategory as $category => $items): ?>
                    <option value="<?= $category ?>">
                        <?= $category ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>
        <!-- Products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <?php foreach ($productsByCategory as $category => $items): ?>
                <?php foreach ($items as $product): ?>

                    <div class="product-card bg-white rounded-xl overflow-hidden border shadow-sm 
                        hover:shadow-xl hover:-translate-y-2 transition-all duration-300"
                        style="border-color: var(--border-light);"
                        data-category="<?= $category ?>">

                        <!-- Image -->
                        <div class="h-56 overflow-hidden bg-gray-100">
                            <img
                                src="admin/images/<?= $product['image'] ?>"
                                alt="<?= $product['name'] ?>"
                                class="w-full h-full object-cover hover:scale-110 transition duration-500">
                        </div>


                        <!-- Content -->
                        <a href="?page=product-detail&&id=<?= $product['id'] ?>">
                            <div class=" p-4">

                                <span class="text-xs px-3 py-1 rounded-full bg-gray-100">
                                    <?= $product['category_name'] ?>
                                </span>

                                <h3 class="font-bold text-lg mt-3 mb-2"
                                    style="color: var(--primary);">
                                    <?= $product['name'] ?>
                                </h3>


                                <p class="text-gray-500 text-sm h-10 overflow-hidden">
                                    <?= $product['description'] ?>
                                </p>


                                <div class="mt-4 flex justify-between items-center">

                                    <span class="font-bold text-xl"
                                        style="color: var(--accent);">
                                        <?= number_format($product['price']) ?>₫
                                    </span>


                                    <button
                                        class="px-4 py-2 text-white rounded-lg text-sm hover:opacity-90 transition"
                                        style="background-color: var(--primary);">

                                        🛒 Mua
                                    </button>

                                </div>

                            </div>
                        </a>

                    </div>

                <?php endforeach; ?>
            <?php endforeach; ?>

        </div>

    </div>
</section>