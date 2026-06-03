<?php
session_start();
include "config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit();
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$total = 0;

foreach ($_SESSION['cart'] as $id => $quantity) {
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $product = mysqli_fetch_assoc($result);
    $total += $product['price'] * $quantity;
}

$user_id = $_SESSION['user_id'];

mysqli_query($conn, "INSERT INTO orders (user_id, total_price) VALUES ('$user_id', '$total')");

$order_id = mysqli_insert_id($conn);

foreach ($_SESSION['cart'] as $id => $quantity) {
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
    $product = mysqli_fetch_assoc($result);
    $price = $product['price'];

    mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, quantity, price)
                         VALUES ('$order_id', '$id', '$quantity', '$price')");
}

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ecommerce-project/assets/css/style.css">
</head>
<body>

<h1>Order Completed Successfully</h1>

<p>Your order has been saved.</p>

<a href="index.php">Back to Store</a>

</body>
</html>