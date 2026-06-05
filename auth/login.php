<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>

body {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    font-family: Arial, Helvetica, sans-serif;

    display: flex;
    justify-content: center;
    align-items: center;

    background-image:
        linear-gradient(
            rgba(0,0,0,0.45),
            rgba(0,0,0,0.45)
        ),
        url('../assets/img/tappi-login-page.jpg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.login-container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-card {
    width: 100%;
    max-width: 450px;

    background: rgba(255,255,255,0.95);

    padding: 40px;
    border-radius: 18px;

    text-align: center;

    box-shadow: 0 20px 45px rgba(0,0,0,0.25);
}

.login-card h1 {
    font-size: 42px;
    margin-bottom: 30px;
    color: #222;
}

.login-card input {
    width: 100%;
    box-sizing: border-box;

    padding: 14px;
    margin-bottom: 18px;

    border: 1px solid #ddd;
    border-radius: 8px;

    font-size: 15px;
}

.login-card input:focus {
    outline: none;
    border-color: #8c0505;
    box-shadow: 0 0 0 3px rgba(255,193,7,0.25);
}

.login-btn {
    width: 100%;
    padding: 14px;

    background: #8c0505;
    color: #ffffff;

    border: none;
    border-radius: 8px;

    font-size: 18px;
    font-weight: bold;

    cursor: pointer;
    transition: 0.3s;
}

.login-btn:hover {
    background: #db8484;
    transform: translateY(-2px);
}

.register-link {
    margin-top: 20px;
}

.register-link a {
    color: #8c0505;
    text-decoration: none;
    font-weight: bold;
}

.register-link a:hover {
    text-decoration: underline;
}

.back-home {
    display: inline-block;
    margin-top: 15px;

    color: #8c0505;
    text-decoration: none;
    font-weight: bold;
}

.back-home:hover {
    text-decoration: underline;
}

@media (max-width: 600px) {

    .login-card {
        width: 90%;
        padding: 30px 25px;
    }

    .login-card h1 {
        font-size: 32px;
    }
}

</style>

</head>
<body>

<div class="login-container">

    <div class="login-card">

        <h1>Login</h1>

        <form action="login_process.php" method="POST">

            <input
                type="email"
                name="email"
                placeholder="Email"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <button type="submit" class="login-btn">
                Login
            </button>

        </form>

        <div class="register-link">
            <a href="register.php">Create an account</a>
        </div>

        <a href="../index.php" class="back-home">
            ← Back to Home
        </a>

    </div>

</div>

</body>
</html>