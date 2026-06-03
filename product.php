<?php
session_start();
include "config/database.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ecommerce-project/assets/css/style.css">
</head>
<body>

<a href="index.php">Back to Products</a>
|
<a href="cart.php">Cart</a>

<hr>

<h1><?php echo $product['name']; ?></h1>

<img src="<?php echo $product['image']; ?>" width="300">

<p>
    <?php echo $product['description']; ?>
</p>

<h3>
    Price: <?php echo $product['price']; ?> €
</h3>

<a href="cart.php?action=add&id=<?php echo $product['id']; ?>">
    Add to Cart
</a>

</body>
</html>