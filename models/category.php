<?php
include('database.php');
function getAllCategory()
{
    global $db;
    $conn = $db->getConnection();

    $result = mysqli_query($conn, "SELECT * FROM categories");

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
