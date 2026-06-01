<?php
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['tab'])) {
        $_SESSION['active_tab'] = $input['tab'];
        echo json_encode(['success' => true, 'tab' => $_SESSION['active_tab']]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Tab parameter missing']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
?>
