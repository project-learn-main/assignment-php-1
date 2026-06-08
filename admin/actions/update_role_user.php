<?php
include('../../models/database.php');

if (isset($_POST["id"]) && isset($_POST["role"])) {
    $conn = $db->getConnection();
    $id = $_POST["id"];
    $role = $_POST["role"];

    $query = "UPDATE users SET role = '$role' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        setcookie('user_add_success', 'true', time() + 10, "/");
        header('Location: ../index.php?tab=user');
    } else {
        setcookie('user_add_error', 'true', time() + 10, "/");
    }

    // header('Location: ../index.php?tab=user&success=updated');
    exit;
}
