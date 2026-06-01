<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    foreach($_SESSION['students'] as $index => $student) {
        if($student['id'] == $id) {
            unset($_SESSION['students'][$index]);
            setcookie('student_delete_success', 'true', time() + 10, "/");
            break;
        }
    }   
    header('Location: ../index.php?tab=students');
}
?>