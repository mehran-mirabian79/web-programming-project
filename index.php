<?php
session_start();
include "config/database.php";

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-commerce Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    
    
</head>
<body>

<nav class="navbar">
    <div class="logo">Enoteca Rosso</div>

    <div class="nav-links">
        <?php if (isset($_SESSION['user_id'])) { ?>
            <span>Welcome, <?php echo $_SESSION['name']; ?></span>

            <?php if ($_SESSION['role'] == 'admin') { ?>
                <a class="btn admin" href="admin/dashboard.php">Admin</a>
            <?php } ?>

            <a class="btn" href="cart.php">Cart</a>
            <a class="btn logout" href="auth/logout.php">Logout</a>
        <?php } else { ?>
            <a class="btn" href="auth/login.php">Login</a>
            <a class="btn" href="auth/register.php">Register</a>
        <?php } ?>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <p class="subtitle">Premium Italian Red Wines</p>
        <h1>Discover Selected Red Wines</h1>
        <p class="hero-text">
            A curated collection of elegant red wines for collectors, restaurants, and wine lovers.
        </p>
        <a href="#products" class="hero-btn">Explore Wines</a>
    </div>
</section>

<section class="container" id="products">
    <div class="section-header">
        <p>Our Selection</p>
        <h2>Red Wine Collection</h2>
    </div>

    <div class="product-grid">
        <?php while ($product = mysqli_fetch_assoc($result)) { ?>
            <div class="wine-card">
                <div class="image-box">
                    <img src="<?php echo $product['image']; ?>" alt="Wine image">
                </div>

                <div class="card-content">
                    <p class="category">Italian Red Wine</p>
                    <h3><?php echo $product['name']; ?></h3>
                    <p class="price"><?php echo $product['price']; ?> €</p>

                    <div class="card-actions">
                        <a href="product.php?id=<?php echo $product['id']; ?>" class="outline-btn">
                            View Details
                        </a>

                        <a href="cart.php?action=add&id=<?php echo $product['id']; ?>" class="solid-btn">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

</body>
</html>