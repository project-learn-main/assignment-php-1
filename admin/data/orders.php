<?php
$dataOrders = [
    [
        'orderId' => 'ORD-001',
        'orderDate' => '2024-03-12',
        'status' => 'Shipped',
        'productId' => 'PROD-001',
        'productName' => 'Laptop',
        'unitPrice' => 999.99,
        'quantity' => 1,
        'customer' => 'John Smith'
    ],
    [
        'orderId' => 'ORD-002',
        'orderDate' => '2024-03-14',
        'status' => 'Shipped',
        'productId' => 'PROD-002',
        'productName' => 'Mouse',
        'unitPrice' => 29.99,
        'quantity' => 2,
        'customer' => 'Sarah Johnson'
    ],
    [
        'orderId' => 'ORD-003',
        'orderDate' => '2024-03-15',
        'status' => 'Delivered',
        'productId' => 'PROD-003',
        'productName' => 'Keyboard',
        'unitPrice' => 79.99,
        'quantity' => 1,
        'customer' => 'Mike Davis'
    ],
    [
        'orderId' => 'ORD-004',
        'orderDate' => '2024-03-16',
        'status' => 'Processing',
        'productId' => 'PROD-004',
        'productName' => 'Monitor',
        'unitPrice' => 299.99,
        'quantity' => 1,
        'customer' => 'Emma Wilson'
    ],
    [
        'orderId' => 'ORD-005',
        'orderDate' => '2024-03-17',
        'status' => 'Pending',
        'productId' => 'PROD-005',
        'productName' => 'Headphones',
        'unitPrice' => 49.99,
        'quantity' => 2,
        'customer' => 'Alex Brown'
    ],
    [
        'orderId' => 'ORD-006',
        'orderDate' => '2024-03-18',
        'status' => 'Shipped',
        'productId' => 'PROD-006',
        'productName' => 'Webcam',
        'unitPrice' => 89.99,
        'quantity' => 1,
        'customer' => 'Lisa Chen'
    ],
    [
        'orderId' => 'ORD-007',
        'orderDate' => '2024-03-19',
        'status' => 'Delivered',
        'productId' => 'PROD-007',
        'productName' => 'USB Hub',
        'unitPrice' => 25.99,
        'quantity' => 3,
        'customer' => 'James Miller'
    ],
    [
        'orderId' => 'ORD-008',
        'orderDate' => '2024-03-20',
        'status' => 'Processing',
        'productId' => 'PROD-008',
        'productName' => 'Mouse Pad',
        'unitPrice' => 15.99,
        'quantity' => 2,
        'customer' => 'Sarah Davis'
    ],
    [
        'orderId' => 'ORD-009',
        'orderDate' => '2024-03-21',
        'status' => 'Pending',
        'productId' => 'PROD-009',
        'productName' => 'Cable',
        'unitPrice' => 9.99,
        'quantity' => 5,
        'customer' => 'Tom Wilson'
    ],
    [
        'orderId' => 'ORD-010',
        'orderDate' => '2024-03-22',
        'status' => 'Shipped',
        'productId' => 'PROD-010',
        'productName' => 'Speaker',
        'unitPrice' => 39.99,
        'quantity' => 1,
        'customer' => 'Amy Johnson'
    ]

];
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = $dataOrders;
}
