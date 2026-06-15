<?php
class CheckoutController {
    public function Render() {
        include('views/checkout.php');
    }
    public function PlaceOrder()
{
    $userId = $_SESSION['userId'];

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $items = getCartItems($userId);

    $total = 0;

    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // tạo order
    $orderId = createOrder(
        $userId,
        $fullname,
        $phone,
        $address,
        $total
    );

    // lưu từng sản phẩm
    foreach ($items as $item) {
        createOrderDetail(
            $orderId,
            $item['product_id'],
            $item['quantity'],
            $item['price']
        );
    }

    // xóa giỏ hàng
    clearCart($userId);

    header("Location: ?page=success");
}
}
?>
