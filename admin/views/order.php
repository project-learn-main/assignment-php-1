<!-- Header -->
<div class="h-full w-full">
    <div class="bg-gray-800 px-6 py-8">
        <div class="flex justify-end w-full">
            <div class="flex items-center gap-3">
                <div class="border-primary border-2 rounded-lg flex items-center justify-center w-12 h-12">
                    <img src="assets/images/avartar.webp" alt="Avatar" class="w-12 h-12 rounded-full">
                </div>
                <h1 class="text-white text-lg">Hello, <?php echo $_SESSION['admin_name']; ?></h1>
            </div>
        </div>
        <h2 class="text-white text-2xl font-semibold">Orders</h2>
        <!-- Filters
        <div class="py-3">
            <div class="flex gap-3">
                <div class="flex-1">
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" class="w-full pl-10 pr-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400"
                            placeholder="Search by order ID or customer..."
                            value="<?php //echo htmlspecialchars($searchQuery); 
                                    ?>"
                            id="orderSearch">
                    </div>
                </div>
                <div class="w-48">
                    <select class="w-full px-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="statusFilter">
                        <option value="all" <?php
                                            // echo $filterStatus === 'all' ? 'selected' : ''; 
                                            ?>>
                            All Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">>Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
        </div> -->
    </div>


    <!-- Table -->
   <div class="overflow-x-auto" style="min-height: 355px;">
    <table class="w-full text-white">
        <thead>
            <tr class="border-b border-gray-700">
                <th class="text-left py-3 px-6 font-medium text-gray-300">Order ID</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Customer</th>
                <th class="text-center py-3 px-6 font-medium text-gray-300">Total</th>
                <th class="text-left py-3 px-6 font-medium text-gray-300">Date</th>
                <th class="text-center py-3 px-6 font-medium text-gray-300">Status</th>
                <th class="text-center py-3 px-6 font-medium text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rowCount = 0;
            $printedOrderIds = []; // Mảng đánh dấu ngăn chặn trùng lặp dòng đơn hàng

            foreach ($data as $order) {
                // CHẶN TRÙNG: Nếu Đơn hàng ID này đã in ra dòng Table rồi, thì bỏ qua không in lại nữa
                if (in_array($order['id'], $printedOrderIds)) {
                    continue;
                }
                $printedOrderIds[] = $order['id']; // Đánh dấu đã xử lý ID này

                $rowCount++;
                echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-order-id="' . $order['id'] . '">';
                echo '<td class="py-3 px-6 font-semibold">#' . $order['id'] . '</td>';
                echo '<td class="py-3 px-6">' . $order['fullname'] . '</td>';
                echo '<td class="py-3 px-6 text-center">' . number_format($order['total_amount'], 0, ',', '.') .' ₫</td>';
                echo '<td class="py-3 px-6">' . date('d-m-Y', strtotime($order['order_date'])) . '</td>';
                echo '<td class="py-3 px-4">';
                
                $status = $order['status'] ?? 'pending';
                echo '<form method="POST" action="?tab=order&action=updateStatus" style="margin: 0;">';
                echo '<input type="hidden" name="orderId" value="' . $order['id'] . '">';
                echo '<select name="status" onchange="this.form.submit()" class="w-full px-2 py-1 bg-gray-700 border border-gray-600 text-white rounded text-sm">';

                $pendingDisabled = ($status !== 'pending') ? ' disabled' : '';
                echo '<option value="pending"' . ($status === 'pending' ? ' selected' : '') . $pendingDisabled . '>Đang chờ</option>';

                $processingDisabled = in_array($status, ['shipping', 'completed', 'cancelled']) ? ' disabled' : '';
                echo '<option value="processing"' . ($status === 'processing' ? ' selected' : '') . $processingDisabled . '>Đang xử lý</option>';

                $shippingDisabled = in_array($status, ['completed', 'cancelled']) ? ' disabled' : '';
                echo '<option value="shipping"' . ($status === 'shipping' ? ' selected' : '') . $shippingDisabled . '>Đang giao hàng</option>';

                $completedDisabled = ($status === 'cancelled') ? ' disabled' : '';
                echo '<option value="completed"' . ($status === 'completed' ? ' selected' : '') . $completedDisabled . '>Hoàn thành</option>';

                $cancelledDisabled = in_array($status, ['shipping', 'completed']) ? ' disabled' : '';
                echo '<option value="cancelled"' . ($status === 'cancelled' ? ' selected' : '') . $cancelledDisabled . '>Đã hủy</option>';

                echo '</select>';
                echo '</form>';
                echo '</td>';
                
                echo '<td class="py-3 px-6">';
                echo '<div class="flex justify-center gap-2">';
                echo '<button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewDetailOrder(\'' . $order['id'] . '\')">';
                echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
                echo '</svg>';
                echo '</button>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

    <!-- Pagination -->
    <?php //if ($totalPages > 1): ?>
        <!-- <div class="px-6 py-4 bg-gray-800 border-t border-gray-700">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-400">
                    Hiển thị <?php echo ($offset + 1); ?> - <?php echo min($offset + $perPage, $total); ?> của <?php echo $total; ?> đơn hàng
                </div>
                <div class="flex gap-2">
                    <?php if ($currentPage > 1): ?>
                        <a href="?tab=order&page=<?php echo $currentPage - 1; ?>" class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-600">Trước</a>
                    <?php else: ?>
                        <span class="px-3 py-1 bg-gray-700 text-white rounded opacity-50 cursor-not-allowed">Trước</span>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <?php if ($i == $currentPage): ?>
                            <span class="px-3 py-1 bg-blue-600 text-white rounded"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="?tab=order&page=<?php echo $i; ?>" class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-600"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?tab=order&page=<?php echo $currentPage + 1; ?>" class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-600">Sau</a>
                    <?php else: ?>
                        <span class="px-3 py-1 bg-gray-700 text-white rounded opacity-50 cursor-not-allowed">Sau</span>
                    <?php endif; ?>
                </div>
            </div>
        </div> -->
    <?php //endif; ?>
</div>
<?php include 'Element/modals.php'; ?>