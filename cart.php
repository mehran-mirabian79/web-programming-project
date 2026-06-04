<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = (float) $_GET['price'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $_SESSION['cart'][$id] = [
            'name' => $name,
            'price' => $price,
            'quantity' => 1
        ];
    }

    header("Location: cart.php");
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'remove') {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart | Wineroad</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f4ef;
            color: #222;
        }

        .cart-container {
            width: 85%;
            max-width: 1100px;
            margin: 70px auto;
            background: #fff;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .top-link {
            display: inline-block;
            margin-bottom: 30px;
            color: #b27a00;
            text-decoration: none;
            font-weight: bold;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th {
            background: #2b1d16;
            color: #fff;
            padding: 16px;
            text-align: left;
        }

        .cart-table td {
            padding: 16px;
            border-bottom: 1px solid #ddd;
        }

        .total-row td {
            font-size: 20px;
            font-weight: bold;
            background: #fafafa;
        }

        .remove-btn {
            color: #c0392b;
            text-decoration: none;
            font-weight: bold;
        }

        .checkout-btn {
            display: inline-block;
            margin-top: 30px;
            background: #ffc107;
            color: #000;
            padding: 14px 35px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        .checkout-btn:hover {
            background: #e0a800;
        }

        .empty-cart {
            padding: 30px;
            text-align: center;
            font-size: 22px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="cart-container">
    <h1>Your Cart</h1>

    <a href="index.php" class="top-link">← Continue Shopping</a>

    <table class="cart-table">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>

        <?php
        $total = 0;

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td><?php echo number_format($item['price'], 2); ?> €</td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo number_format($subtotal, 2); ?> €</td>
                    <td>
                        <a href="cart.php?action=remove&id=<?php echo $id; ?>" class="remove-btn">
                            Remove
                        </a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="5" class="empty-cart">Your cart is empty.</td></tr>';
        }
        ?>

        <tr class="total-row">
            <td colspan="3">Total</td>
            <td><?php echo number_format($total, 2); ?> €</td>
            <td></td>
        </tr>
    </table>

    <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
</div>

</body>
</html>