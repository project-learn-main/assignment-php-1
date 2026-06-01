<?php
session_start();

if(isset($_POST["id"]) && isset($_POST["status"])) {
    echo("update student status");
    $id = $_POST['id'];
    $status = $_POST['status'];
    foreach($_SESSION['students'] as $index => $student) {
        if($student['id'] == $id) {
            $_SESSION['students'][$index]['status'] = $status;
            setcookie('student_update_success', 'true', time() + 10, "/");
            break;
        }
    }   
    header('Location: ../index.php?tab=student&status_updated=success');
} else {
    echo("error");
}