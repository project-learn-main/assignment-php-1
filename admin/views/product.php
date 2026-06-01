<?php
    
    include_once __DIR__ . '../../data/customers.php';

    if (isset($_GET['idDelete']) && $_GET['idDelete'] != '') {
        foreach($_SESSION['customers'] as $index => $customer) {
            if($customer['id'] == $_GET['idDelete']) {
                unset($_SESSION['customers'][$index]);
                break;
            }
        }
    }

    // Simple pagination
    $currentPage = 1; // Default to page 1
    // Only read page parameter if this tab is active
    $activeTab = isset($_GET['tab']) ? $_GET['tab'] : (isset($_SESSION['active_tab']) ? $_SESSION['active_tab'] : 'customers');
    if ($activeTab === 'customers' && isset($_GET['page'])) {
        $currentPage = (int)$_GET['page'];
    }
    $perPage = 5;
    
    // Sort customers by ID descending
    $sortedCustomers = $_SESSION['customers'];
    usort($sortedCustomers, function($a, $b) {
        return $b['id'] - $a['id'];
    });
    
    $total = count($sortedCustomers);
    $totalPages = ceil($total / $perPage);
    $page = max(1, min($currentPage, $totalPages));
    $offset = ($currentPage - 1) * $perPage;
    $customersPage = array_slice($sortedCustomers, $offset, $perPage);
?>
<!-- Header -->
<div class="h-full w-full">
    <div class="bg-gray-800 px-6 py-8">
        <div class="flex justify-end w-full">
           <div class="flex items-center gap-3">
               <div class="border-primary border-2 rounded-lg flex items-center justify-center w-12 h-12">
                   <img src="assets/images/avartar.webp" alt="Avatar" class="w-12 h-12 rounded-full">
               </div>
               <h1 class="text-white text-lg">Hello, <?php echo $_COOKIE['name']; ?></h1>
           </div>
       </div>
        <div class="flex items-center gap-4">
            <h2 class="text-white text-2xl font-semibold">Customers</h2>
            <button class="bg-primary hover:opacity-80 text-white px-4 py-2 rounded-lg transition-colors flex items-center" onclick="openModal('addCustomerModal')">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
                New Customer
            </button>
            </div>
        <!-- <div class="py-3">
            <div class="flex gap-3">
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" class="w-full pl-10 pr-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent placeholder-gray-400" 
                        placeholder="Search by name or email..." 
                        value="<?php //echo htmlspecialchars($searchQuery); ?>"
                        id="customerSearch">
                </div>
                <div class="w-48">
                    <select class="w-full px-4 py-2 bg-gray-800 border border-gray-600 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="statusFilter">
                        <option value="all" <?php  
                        // echo $filterStatus === 'all' ? 'selected' : ''; ?>>
                        All Status</option>
                        <option value="active" <?php  //echo $filterStatus === 'active' ? 'selected' : ''; ?>>Active</option>
                        <option value="active" <?php  //echo $filterStatus === 'active' ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Table -->
    <div class="overflow-x-auto" style="min-height: 375px;">
        <table class="w-full text-white">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="text-left py-3 px-4 font-medium text-gray-300">ID</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-300">Tên khách hàng</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-300">Sô diên thoai</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-300">Ngày sinh</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-300">Giói tính</th>
                    <th class="text-left py-3 px-4 font-medium text-gray-300">Dia chi</th>
                    <th class="text-center py-3 px-4 font-medium text-gray-300">Hinh anh</th>
                    <th class="text-center py-3 px-4 font-medium text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
             $dataCustomers = $_SESSION['customers']; 
             $rowCount = 0;
             foreach ($customersPage as $customer) {
                $rowCount++;
                echo '<tr class="border-b border-gray-800 hover:bg-gray-800 transition-colors" data-customer-id="' . $customer['id'] . '">';
                echo '<td class="py-3 px-4 font-semibold">' . $customer['id'] . '</td>';
                echo '<td class="py-3 px-4">' . $customer['name'] . '</td>';
                echo '<td class="py-3 px-4">' . $customer['phone'] . '</td>';
                echo '<td class="py-3 px-4">' . ($customer['dateOfBirth'] ?? '') . '</td>';
                echo '<td class="py-3 px-4">' . ($customer['gender'] ?? '') . '</td>';
                echo '<td class="py-3 px-4">' . ($customer['address'] ?? '') . '</td>';
                echo '<td class="py-3 px-4 text-center">';
                $imageSrc = !empty($customer['image']) ? $customer['image'] : 'https://via.placeholder.com/50';
                echo '<img src="' . $imageSrc . '" alt="' . $customer['name'] . '" class="w-10 h-10 rounded-full mx-auto">';
                echo '</td>';
                echo '<td class="py-3 px-4 text-center">';
                echo '<button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="viewCustomer(\'' . $customer['id'] . '\')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>';
                echo '<button class="p-2 text-gray-400 hover:text-white hover:bg-gray-700 rounded transition-colors" onclick="updateCustomer(\'' . $customer['id'] . '\')">';
                echo '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">';
                echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>';
                echo '</svg>';
                echo '</button>';
                echo '<button class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-700 rounded transition-colors" onclick="deleteCustomer(\'' . $customer['id'] . '\')">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>';
                echo '</td>';
                echo '</tr>';
             }
             
             // Add empty rows to always show 5 rows
             for ($i = $rowCount; $i < 5; $i++) {
                echo '<tr class="border-b border-gray-800">';
                echo '<td class="py-3 px-4 font-semibold">&nbsp;</td>';
                echo '<td class="py-3 px-4">&nbsp;</td>';
                echo '<td class="py-3 px-4">&nbsp;</td>';
                echo '<td class="py-3 px-4">&nbsp;</td>';
                echo '<td class="py-3 px-4">&nbsp;</td>';
                echo '<td class="py-3 px-4">&nbsp;</td>';
                echo '<td class="py-3 px-4 text-center">&nbsp;</td>';
                echo '<td class="py-3 px-4 text-center">&nbsp;</td>';
                echo '</tr>';
             }
             ?>
                
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
    <div class="px-6 py-4 bg-gray-800 border-t border-gray-700">
        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-400">
                Hiển thị <?php echo ($offset + 1); ?> - <?php echo min($offset + $perPage, $total); ?> của <?php echo $total; ?> khách hàng
            </div>
            <div class="flex gap-2">
                <?php if ($currentPage > 1): ?>
                    <a href="?tab=customers&page=<?php echo $currentPage - 1; ?>" class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-600">Trước</a>
                <?php else: ?>
                    <span class="px-3 py-1 bg-gray-700 text-white rounded opacity-50 cursor-not-allowed">Trước</span>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $currentPage): ?>
                        <span class="px-3 py-1 bg-blue-600 text-white rounded"><?php echo $i; ?></span>
                    <?php else: ?>
                        <a href="?tab=customers&page=<?php echo $i; ?>" class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-600"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                
                <?php if ($currentPage < $totalPages): ?>
                    <a href="?tab=customers&page=<?php echo $currentPage + 1; ?>" class="px-3 py-1 bg-gray-700 text-white rounded hover:bg-gray-600">Sau</a>
                <?php else: ?>
                    <span class="px-3 py-1 bg-gray-700 text-white rounded opacity-50 cursor-not-allowed">Sau</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>


