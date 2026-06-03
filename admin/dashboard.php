<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ecommerce-project/assets/css/style.css">
</head>
<body>

<h1>Admin Dashboard</h1>

<a href="add_product.php">Add New Product</a>
<br><br>
<a href="../index.php">Back to Website</a>
<br><br>
<a href="../auth/logout.php">Logout</a>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>

    <?php while ($product = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['price']; ?> €</td>
            <td>
                <img src="<?php echo $product['image']; ?>" width="80">
            </td>
            <td>
                <a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a>
                |
                <a href="delete_product.php?id=<?php echo $product['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>

</table>

</body>
</html>