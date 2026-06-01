<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $studentId = $_POST['id'];
    

    $imagePath = null; // Will keep old image if null
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['image'];
        $uploadDir = __DIR__ . '/../images';
        
        // Create upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir);
        }
        
        // Generate unique filename
        $fileName = 'student_' . $studentId . '_' . time() . '_' . basename($file['name']);
        $targetPath = $uploadDir . '/' . $fileName;
        
        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $imagePath = 'images/' . $fileName;
        }
    }
    // Update student data with form fields
    $updatedData = [
        'id' => $studentId,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'studentId' => $_POST['studentId'],
        'phone' => $_POST['phone'],
        'gender' => $_POST['gender'],
        'address' => $_POST['address'],
        'status' => $_POST['status'],
        'image' => $imagePath,
        'dateOfBirth' => $_POST['dateOfBirth']
    ];
    
    // Find and update student in session
    if (isset($_SESSION['students'])) {
        foreach ($_SESSION['students'] as $key => $student) {
            if ($student['id'] == $studentId) {
                $_SESSION['students'][$key] = $updatedData;
                setcookie('student_update_success', 'true', time() + 10, "/");
                break;
            }
        }
    }
    
    // Redirect back to the main page
    header('Location: ../index.php?tab=students&success=updated');
    exit;
}
?>
