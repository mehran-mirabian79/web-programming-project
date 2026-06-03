<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$id";

mysqli_query($conn, $sql);

header("Location: dashboard.php");
exit();
?>