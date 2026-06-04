<?php
session_start();
include '../config/database.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Wineroad</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f4ef;
            color: #222;
        }

        .login-container {
            width: 400px;
            margin: 90px auto;
            background: #fff;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 42px;
        }

        input {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background: #ffc107;
            color: #000;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
        }

        button:hover {
            background: #e0a800;
        }

        .register-link,
        .home-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #b27a00;
            text-decoration: none;
            font-weight: bold;
        }

        .error {
            background: #ffe0e0;
            color: #b00020;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="login-container">
    <h1>Login</h1>

    <?php if ($error != "") { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <a href="register.php" class="register-link">Create an account</a>
    <a href="../index.php" class="home-link">← Back to Home</a>
</div>

</body>
</html>