<?php
session_start();
include "../config/database.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    $sql = "INSERT INTO products (name, description, price, image)
            VALUES ('$name', '$description', '$price', '$image')";

    if (mysqli_query($conn, $sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Product was not added";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ecommerce-project/assets/css/style.css">
</head>
<body>

<h1>Add Product</h1>

<form method="POST">
    <input type="text" name="name" placeholder="Product name" required>
    <br><br>

    <textarea name="description" placeholder="Description" required></textarea>
    <br><br>

    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <br><br>

    <input type="text" name="image" placeholder="Image URL" required>
    <br><br>

    <button type="submit">Add Product</button>
</form>

<?php if (!empty($error)) echo $error; ?>

<br><br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>