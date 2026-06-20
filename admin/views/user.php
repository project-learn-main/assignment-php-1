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
        <h2 class="text-white text-2xl font-semibold mt-4">Users</h2>
    </div>

    <div class="overflow-x-auto px-6" style="min-height: 375px;">
        <table class="w-full text-white mt-4">
            <thead>
                <tr class="border-b border-gray-700 text-left">
                    <th class="py-3 px-4 font-medium text-gray-300">ID</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Full Name</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Email</th>
                    <th class="py-3 px-4 font-medium text-gray-300">Role</th>
                    <th class="py-3 px-4 font-medium text-gray-300 text-center">Created At</th>
                    <th class="py-3 px-4 font-medium text-gray-300 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rowCount = 0;
                foreach ($data as $user) {
                    $rowCount++;
                    echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-user-id="' . $user['id'] . '">';
                    echo '<td class="py-3 px-4 font-semibold">' . $user['id'] . '</td>';
                    echo '<td class="py-3 px-4">' . htmlspecialchars($user['fullname']) . '</td>';
                    echo '<td class="py-3 px-4 text-gray-400">' . htmlspecialchars($user['email']) . '</td>';
                    echo '<td class="py-3 px-4 w-40">';
                    $role = strtolower($user['role'] ?? 'customer');
                    echo '<form method="POST" action="actions/update_role_user.php" class="m-0">';
                    echo '<input type="hidden" name="id" value="' . $user['id'] . '">';
                    echo '<select class="w-full px-2 py-1 bg-gray-700 border border-gray-600 text-white rounded text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" name="role" onchange="this.form.submit()">';
                    echo '<option value="Admin"' . ($role === 'admin' ? ' selected' : '') . '>Admin</option>';
                    echo '<option value="Customer"' . ($role === 'customer' ? ' selected' : '') . '>Customer</option>';
                    echo '</select>';
                    echo '</form>';
                    echo '</td>';
                    echo '<td class="py-3 px-4 text-center text-gray-400">' . date('d/m/Y', strtotime($user['created_at'])) . '</td>';
                    echo '<td class="py-3 px-4 text-center">';
                    echo '<button class="p-1.5 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors mr-1" onclick="viewUser(\'' . $user['id'] . '\')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>';
                    echo '</button>';
                    echo '<button class="p-1.5 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors mr-1" onclick="updateUser(\'' . $user['id'] . '\')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>';
                    echo '</button>';
                    echo '<button class="p-1.5 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteUser(\'' . $user['id'] . '\')">';
                    echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>';
                    echo '</button>';
                    echo '</td>';
                    echo '</tr>';
                }

                // Vẽ dòng trống bù khung giao diện
                for ($i = $rowCount; $i < 5; $i++) {
                    echo '<tr class="border-b border-gray-800 h-[53px]">';
                    echo '<td class="py-3 px-4">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
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
                    Trang <span class="font-semibold text-white"><?= $currentPage ?></span> / <span class="font-semibold text-white"><?= $totalPages ?></span> (Hiển thị <?= $rowCount ?> tài khoản)
                </div>
                <div class="flex gap-2">
                    <?php if ($currentPage > 1): ?>
                        <a href="?tab=user&page=<?= $currentPage - 1 ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors">Trước</a>
                    <?php else: ?>
                        <span class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded opacity-40 cursor-not-allowed">Trước</span>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <?php if ($i == $currentPage): ?>
                            <span class="px-3 py-1.5 bg-blue-600 text-white text-sm font-semibold rounded shadow-md"><?= $i ?></span>
                        <?php else: ?>
                            <a href="?tab=user&page=<?= $i ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors"><?= $i ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?tab=user&page=<?= $currentPage + 1 ?>" class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded hover:bg-gray-600 transition-colors">Sau</a>
                    <?php else: ?>
                        <span class="px-3 py-1.5 bg-gray-700 text-white text-sm rounded opacity-40 cursor-not-allowed">Sau</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>