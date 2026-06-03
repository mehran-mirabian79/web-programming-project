<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$product = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    $sql = "UPDATE products 
            SET name='$name', description='$description', price='$price', image='$image'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Product was not updated";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ecommerce-project/assets/css/style.css">
</head>
<body>

<h1>Edit Product</h1>

<form method="POST">
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
    <br><br>

    <textarea name="description" required><?php echo $product['description']; ?></textarea>
    <br><br>

    <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
    <br><br>

    <input type="text" name="image" value="<?php echo $product['image']; ?>" required>
    <br><br>

    <button type="submit">Update Product</button>
</form>

<?php if (!empty($error)) echo $error; ?>

<br><br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>