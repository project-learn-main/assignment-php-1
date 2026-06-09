<?php
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    header('Location: ../index.php?tab=product');
}
?>