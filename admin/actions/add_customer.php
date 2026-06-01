<?php
session_start();
if(isset($_POST['name']) && isset($_POST['dateOfBirth']) && isset($_POST['gender']) && isset($_POST['address']) 
   && isset($_POST['phone']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
   
    
    $picture = $_FILES['image'];
    $path = __DIR__ . '/../images';
    
    if (!is_dir($path))
        mkdir($path);
     // Hàm di chuy?n file
    $targetPath = $path . '/' . $picture['name'];
    if (move_uploaded_file($picture['tmp_name'], $targetPath)) {
        // Get the highest existing ID to generate new ID
        $maxId = 0;
        foreach ($_SESSION['customers'] as $customer) {
            if (is_numeric($customer['id']) && $customer['id'] > $maxId) {
                $maxId = $customer['id'];
            }
        }
        $newId = $maxId + 1;
        
        array_unshift($_SESSION['customers'],
        [
            'id' => $newId,
            'name' => $name,
            'phone' => $phone,
            'dateOfBirth' => $dateOfBirth,
            'gender' => $gender,
            'address' => $address,
            'image' => 'images/' . $picture['name']
        ]);
        setcookie('customer_add_success', 'true', time() + 10, "/");
    } else {
        setcookie('customer_add_error', 'true', time() + 10, "/");
    }
   
}

header('Location: ../index.php?tab=customers'); 
exit;
?>
