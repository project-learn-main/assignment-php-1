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
            <h2 class="text-white text-2xl font-semibold">Categories</h2>
            <button class="bg-primary hover:opacity-80 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="openModal('addCategoryModal')">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Category
            </button>
        </div>
    </div>

    <div class="overflow-x-auto px-6" style="min-height: 400px;">
        <table class="w-full text-white mt-4">
            <thead>
                <tr class="border-b border-gray-700 text-left">
                    <th class="py-3 px-4 font-medium text-gray-300">ID</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Name</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Description</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Created By</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Created At</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rowCount = 0;
                if (!empty($data)) {
                    foreach ($data as $category) {
                        $rowCount++;
                        echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-category-id="' . $category['id'] . '">';
                        echo '<td class="py-3 px-4 font-semibold">' . $category['id'] . '</td>';
                        echo '<td class="py-3 px-4">' . htmlspecialchars($category['name']) . '</td>';
                        echo '<td class="py-3 px-4 text-gray-400">' . htmlspecialchars($category['description'] ?? '') . '</td>';
                        // Đã sửa lỗi hiển thị sai cột Created By ở dòng dưới
                        echo '<td class="py-3 px-4">' . htmlspecialchars($category['created_by'] ?? 'Admin') . '</td>';
                        echo '<td class="py-3 px-4 text-sm text-gray-400">' . ($category['created_at'] ?? '') . '</td>';
                        echo '<td class="py-3 px-4">';

                        echo '<button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors mr-1" onclick="updateCategory(\'' . $category['id'] . '\')">';
                        echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>';
                        echo '</svg>';
                        echo '</button>';
                        
                        echo '<button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteCategory(\'' . $category['id'] . '\')">';
                        echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                        echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>';
                        echo '</svg>';
                        echo '</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                }

                // Giữ nguyên logic bù dòng trống của bạn để khung Table không bị co rúm
                for ($i = $rowCount; $i < 5; $i++) {
                    echo '<tr class="border-b border-gray-800">';
                    echo '<td class="py-3 px-4 font-semibold">&nbsp;</td>';
                    echo '<td class="py-3 px-4">&nbsp;</td>';
                    echo '<td class="py-3 px-4">&nbsp;</td>';
                    echo '<td class="py-3 px-4">&nbsp;</td>';
                    echo '<td class="py-3 px-4">&nbsp;</td>';
                    echo '<td class="py-3 px-4">&nbsp;</td>';
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
                    Trang <span class="font-semibold text-white"><?php echo $currentPage; ?></span> trên <span class="font-semibold text-white"><?php echo $totalPages; ?></span> trang danh mục
                </div>
                <div class="flex gap-2">
                    <?php if ($currentPage > 1): ?>
                        <a href="?tab=category&page=<?php echo $currentPage - 1; ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors">Trước</a>
                    <?php else: ?>
                        <span class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded opacity-40 cursor-not-allowed">Trước</span>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <?php if ($i == $currentPage): ?>
                            <span class="px-3 py-1.5 bg-blue-600 text-white text-sm font-semibold rounded shadow-md"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="?tab=category&page=<?php echo $i; ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?tab=category&page=<?php echo $currentPage + 1; ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors">Sau</a>
                    <?php else: ?>
                        <span class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded opacity-40 cursor-not-allowed">Sau</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'Element/modals.php'; ?>