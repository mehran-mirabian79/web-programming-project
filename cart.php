<?php
session_start();
include "config/database.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $id = $_GET['id'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }

    header("Location: cart.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] == 'remove') {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);

    header("Location: cart.php");
    exit();
}

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ecommerce-project/assets/css/style.css">
</head>
<body>

<h1>Your Cart</h1>

<a href="index.php">Continue Shopping</a>

<hr>

<?php if (empty($_SESSION['cart'])) { ?>

    <p>Your cart is empty.</p>

<?php } else { ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>

        <?php foreach ($_SESSION['cart'] as $id => $quantity) { ?>

            <?php
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
            $product = mysqli_fetch_assoc($result);

            $subtotal = $product['price'] * $quantity;
            $total += $subtotal;
            ?>

            <tr>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?> €</td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo $subtotal; ?> €</td>
                <td>
                    <a href="cart.php?action=remove&id=<?php echo $id; ?>">Remove</a>
                </td>
            </tr>

        <?php } ?>

        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td colspan="2"><strong><?php echo $total; ?> €</strong></td>
        </tr>
    </table>

    <br>

    <a href="checkout.php">Checkout</a>

<?php } ?>

</body>
</html>