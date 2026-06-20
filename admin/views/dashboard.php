<?php
// var_dump($data);
// Get statistics from session data
$customersCount = count($_SESSION['customers'] ?? []);
$studentsCount = count($_SESSION['students'] ?? []);

// Calculate order status statistics with Vietnamese labels
$orderStatusStats = [];
$orders = $_SESSION['orders'] ?? [];
foreach ($orders as $order) {
    $status = $order['status'];
    if (!isset($orderStatusStats[$status])) {
        $orderStatusStats[$status] = 0;
    }
    $orderStatusStats[$status]++;
}

// Vietnamese order status mapping
$orderStatusLabels = [
    'Shipped' => 'Vận chuyển',
    'Delivered' => 'Giao hàng thành công',
    'Processing' => 'Xử lý',
    'Pending' => 'Chờ xác nhận'
];

// Calculate student status statistics with Vietnamese labels
$studentStatusStats = [];
$students = $_SESSION['students'] ?? [];
foreach ($students as $student) {
    $status = $student['status'] ?? 'Đang học';
    if (!isset($studentStatusStats[$status])) {
        $studentStatusStats[$status] = 0;
    }
    $studentStatusStats[$status]++;
}

// Vietnamese student status mapping
$studentStatusLabels = [
    'Đang học' => 'Đang học',
    'Bảo lưu' => 'Bảo lưu',
    'Thôi học' => 'Thôi học',
];

// Calculate gender statistics with Vietnamese labels
$customerGenderStats = ['Male' => 0, 'Female' => 0];
$customers = $_SESSION['customers'] ?? [];
foreach ($customers as $customer) {
    $gender = $customer['gender'];
    if (isset($customerGenderStats[$gender])) {
        $customerGenderStats[$gender]++;
    }
}

$genderLabels = [
    'Male' => 'Nam',
    'Female' => 'Nữ'
];
?>

<div class="p-6 w-full">
    <div class="flex justify-end w-full">
        <div class="flex items-center gap-3">
            <div class="border-primary border-2 rounded-lg flex items-center justify-center w-12 h-12">
                <img src="assets/images/avartar.webp" alt="Avatar" class="w-12 h-12 rounded-full">
            </div>
            <h1 class="text-white text-lg">Hello, <?php echo $_SESSION['admin_name']; ?></h1>
        </div>
    </div>
    <h2 class="text-2xl font-bold text-white mb-6 capitalize">Bảng điều khiển</h2>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Orders Card -->
        <div class="bg-secondary rounded-lg p-6 border border-slate-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Đơn hàng chưa xử lý</p>
                    <p class="text-3xl font-bold text-white mt-2"><?php echo $countPendingOrders; ?></p>
                </div>
                <div class="bg-blue-500 bg-opacity-20 rounded-lg p-3">
                    <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Customers Card -->
        <div class="bg-secondary rounded-lg p-6 border border-slate-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Đơn hàng đã hoàn thành</p>
                    <p class="text-3xl font-bold text-white mt-2"><?php echo $countCompleteOrders; ?></p>
                </div>
                <div class="bg-green-500 bg-opacity-20 rounded-lg p-3">
                    <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Students Card -->
        <div class="bg-secondary rounded-lg p-6 border border-slate-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm">Tổng số lượng Admin</p>
                    <p class="text-3xl font-bold text-white mt-2"><?php echo $countAdmin; ?></p>
                </div>
                <div class="bg-purple-500 bg-opacity-20 rounded-lg p-3">
                    <svg class="w-8 h-8 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Statistics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Order Status Breakdown -->
        <div class="bg-secondary rounded-lg p-6 border border-slate-700">
            <h3 class="text-lg font-semibold text-white mb-4">Trạng thái đơn hàng</h3>
            <div class="space-y-3">
                <?php foreach ($orderStatusStats as $status => $count): ?>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-300"><?php echo htmlspecialchars($orderStatusLabels[$status] ?? $status); ?></span>
                        <div class="flex items-center">
                            <div class="w-24 bg-slate-700 rounded-full h-2 mr-3">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: <?php echo ($count / $ordersCount) * 100; ?>%"></div>
                            </div>
                            <span class="text-white font-medium"><?php echo $count; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Student Status Breakdown -->
        <div class="bg-secondary rounded-lg p-6 border border-slate-700">
            <h3 class="text-lg font-semibold text-white mb-4">Trạng thái sinh viên</h3>
            <div class="space-y-3">
                <?php foreach ($studentStatusStats as $status => $count): ?>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-300"><?php echo htmlspecialchars($studentStatusLabels[$status] ?? $status); ?></span>
                        <div class="flex items-center">
                            <div class="w-24 bg-slate-700 rounded-full h-2 mr-3">
                                <div class="bg-purple-500 h-2 rounded-full" style="width: <?php echo ($count / $studentsCount) * 100; ?>%"></div>
                            </div>
                            <span class="text-white font-medium"><?php echo $count; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Customer Gender Breakdown -->
        <div class="bg-secondary rounded-lg p-6 border border-slate-700">
            <h3 class="text-lg font-semibold text-white mb-4">Giới tính khách hàng</h3>
            <div class="space-y-3">
                <?php foreach ($customerGenderStats as $gender => $count): ?>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-300"><?php echo htmlspecialchars($genderLabels[$gender] ?? $gender); ?></span>
                        <div class="flex items-center">
                            <div class="w-24 bg-slate-700 rounded-full h-2 mr-3">
                                <div class="bg-green-500 h-2 rounded-full" style="width: <?php echo ($count / $customersCount) * 100; ?>%"></div>
                            </div>
                            <span class="text-white font-medium"><?php echo $count; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
</div>