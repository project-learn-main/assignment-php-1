<div class="h-full w-full">
    <div class="bg-gray-800 px-6 py-8">
        <div class="flex justify-end w-full">
            <div class="flex items-center gap-3">
                <div class="border-primary border-2 rounded-lg flex items-center justify-center w-12 h-12">
                    <img src="assets/images/avartar.webp" alt="Avatar" class="w-12 h-12 rounded-full">
                </div>
                <h1 class="text-white text-lg">Hello, <?php echo htmlspecialchars($_SESSION['admin_name']); ?></h1>
            </div>
        </div>
        <div class="flex items-center gap-4 mt-4">
            <h2 class="text-white text-2xl font-semibold">Products</h2>
            <button class="bg-primary hover:opacity-80 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="openModal('addProductModal')">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Product
            </button>
        </div>
    </div>

    <div class="overflow-x-auto px-6" style="min-height: 375px;">
        <table class="w-full text-white mt-4">
            <thead>
                <tr class="border-b border-gray-700 text-left">
                    <th class="py-3 px-4 font-medium text-gray-300">ID</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Name</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Category</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Description</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Price</th>
                    <th class="py-3 px-4 font-medium text-gray-300 text-center">Image</th>
                    <th class="py-3 px-4 font-medium text-gray-300 text-center">Stock</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Created By</th>
                    <th class="py-3 px-4 font-medium text-gray-300 text-center">Created At</th>
                    <th class="py-3 px-4 font-medium text-gray-300 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rowCount = 0;
                foreach ($data as $product) {
                    $rowCount++;
                    echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-product-id="' . $product['id'] . '">';
                    echo '<td class="py-3 px-4 font-semibold">' . $product['id'] . '</td>';
                    echo '<td class="py-3 px-4">' . htmlspecialchars($product['name']) . '</td>';
                    echo '<td class="py-3 px-4 text-blue-400">' . htmlspecialchars($product['category_name']) . '</td>';
                    echo '<td class="py-3 px-4 text-gray-400 max-w-xs truncate">' . htmlspecialchars($product['description'] ?? '') . '</td>';
                    echo '<td class="py-3 px-4 text-green-400 font-medium">' . number_format($product['price']) . 'đ</td>';
                    echo '<td class="py-3 px-4 text-center">';
                    $imageSrc = !empty($product['image']) ? 'images/' . $product['image'] : 'https://via.placeholder.com/50';
                    echo '<img src="' . $imageSrc . '" alt="' . htmlspecialchars($product['name']) . '" class="w-10 h-10 object-cover rounded mx-auto">';
                    echo '</td>';
                    echo '<td class="py-3 px-4 text-center">' . $product['stock'] . '</td>';
                    echo '<td class="py-3 px-4">' . htmlspecialchars($product['fullname'] ?? 'System') . '</td>';
                    echo '<td class="py-3 px-4 text-center text-sm text-gray-400">' . date('d/m/Y', strtotime($product['created_at'])) . '</td>';
                    echo '<td class="py-3 px-4 text-center">';
                    echo '<button class="p-1.5 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors mr-1" onclick="updateProduct(' . $product['id'] . ', ' . $product['category_id'] . ')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>';
                    echo '</button>';
                    echo '<button class="p-1.5 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteProduct(\'' . $product['id'] . '\')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>';
                    echo '</button>';
                    echo '</td>';
                    echo '</tr>';
                }

                // Vẽ dòng trống giữ khung
                for ($i = $rowCount; $i < 5; $i++) {
                    echo '<tr class="border-b border-gray-800 h-[61px]">';
                    echo '<td class="py-3 px-4">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($totalPages) && $totalPages > 1): ?>
        <div class="mx-6 my-4 px-6 py-4 bg-gray-800/50 rounded-xl border border-gray-700/60 mt-6">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-400">
                    Trang <span class="font-semibold text-white"><?= $currentPage ?></span> / <span class="font-semibold text-white"><?= $totalPages ?></span> (Hiển thị <?= $rowCount ?> dòng)
                </div>
                <div class="flex gap-2">
                    <?php if ($currentPage > 1): ?>
                        <a href="?tab=products&page=<?= $currentPage - 1 ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors">Trước</a>
                    <?php else: ?>
                        <span class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded opacity-40 cursor-not-allowed">Trước</span>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <?php if ($i == $currentPage): ?>
                            <span class="px-3 py-1.5 bg-blue-600 text-white text-sm font-semibold rounded shadow-md"><?= $i ?></span>
                        <?php else: ?>
                            <a href="?tab=products&page=<?= $i ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors"><?= $i ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?tab=products&page=<?= $currentPage + 1 ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors">Sau</a>
                    <?php else: ?>
                        <span class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded opacity-40 cursor-not-allowed">Sau</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'Element/modals.php'; ?>