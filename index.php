<?php
include 'config/database.php';
$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wineroad</title>

    <link rel="icon" href="/ecommerce-project/favicon-32x32.png">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>

<header class="hero-section">
    <nav class="hero-navbar">
        <div class="brand">
            <h1>Wineroad</h1>
            <p>enoteca con cucina</p>
        </div>

        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="#menu">Menu</a>
            <a href="#products">Products</a>
            <a href="cart.php">Cart</a>
            <a href="auth/login.php">Login</a>
            <a href="auth/register.php">Sign Up</a>
        </div>
    </nav>
</header>

<section id="menu" class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Menu</h2>
            <h3 class="section-subheading text-muted">Choose your experience</h3>
        </div>

        <div class="row text-center">

    <div class="col-md-4">
        <img src="assets/img/menu/cena-italiano-edited.jpg" class="menu-img" alt="Cena">

        <h4>Cena</h4>

        <p>
            Dinner menu with selected dishes and Italian wines.
        </p>
    </div>

    <div class="col-md-4">
        <img src="assets/img/menu/pranzo-italiano-edited.jpg" class="menu-img" alt="Pranzo">

        <h4>Pranzo</h4>

        <p>
            Lunch selection with fresh ingredients and daily proposals.
        </p>
    </div>

    <div class="col-md-4">
        <img src="assets/img/menu/Italian Antipasto Platter-edited.jpg" class="menu-img" alt="Aperitivo">

        <h4>Aperitivo</h4>

        <p>
            Aperitivo with wine, cheese, cured meats and small plates.
        </p>
    </div>

</div>
</section>

<section id="products" class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Products of ENOTECA</h2>
            <h3 class="section-subheading text-muted">
                Selected Italian Wines
            </h3>
        </div>

```
    <div class="row">

        <div class="col-md-4 mb-5">
            <div class="card product-card">
                <img src="assets/img/product/Hugonis-vino.jpg" class="card-img-top">

                <div class="card-body">
                    <p class="price">29,50 €</p>

                    <h5>
                        'Hugonis'
                        Roero Riserva Docg
                    </h5>

                    <p>Matteo Correggia</p>

                    <a href="cart.php?action=add&id=1&name=Hugonis%20Roero%20Riserva%20Docg&price=29.50" class="btn btn-warning">Add to Cart</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4 d-flex">
            <div class="card product-card">
                <img src="assets/img/product/terre-a-mano-vino.jpg" class="card-img-top">

                <div class="card-body">
                    <p class="price">23,50 €</p>

                    <h5>
                        'TERRE A MANO'
                        Roero Arneis Docg
                    </h5>

                    <p>Giovanni Almondo</p>

                    <a href="cart.php?action=add&id=2&name=TERRE%20A%20MANO%20Roero%20Arneis%20Docg&price=23.50" class="btn btn-warning">Add to Cart</a>

                </div>
            </div>
        </div>

        <div class="col-md-4 mb-5">
            <div class="card product-card">
                <img src="assets/img/product/vigna-baribischio-vino.jpg" class="card-img-top">

                <div class="card-body">
                    <p class="price">25,90 €</p>

                    <h5>
                        'VIGNA BARIBISCHIO'
                        Roero Docg
                    </h5>

                    <p>Giovanni Almondo</p>

                    <a href="cart.php?action=add&id=3&name=VIGNA%20BARIBISCHIO%20Roero%20Docg&price=25.90" class="btn btn-warning">Add to Cart</a>
                </div>
            </div>
        </div>

    </div>
</div>
```

</section>

<footer class="footer">
    <p>&copy; 2026 Wineroad - Enoteca con cucina</p>
</footer>

<script src="js/scripts.js"></script>
</body>
</html>