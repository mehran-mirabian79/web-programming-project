<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Account</title>

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
        url('../assets/img/signup-enoteca.jpg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.register-container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.register-card {
    width: 100%;
    max-width: 450px;

    background: rgba(255,255,255,0.95);

    padding: 40px;
    border-radius: 18px;

    text-align: center;

    box-shadow: 0 20px 45px rgba(0,0,0,0.25);
}

.register-card h1 {
    font-size: 42px;
    margin-bottom: 10px;
    color: #222;
}

.subtitle {
    color: #666;
    margin-bottom: 30px;
    font-size: 15px;
}

.register-card input {
    width: 100%;
    box-sizing: border-box;

    padding: 14px;
    margin-bottom: 18px;

    border: 1px solid #ddd;
    border-radius: 8px;

    font-size: 15px;
}

.register-card input:focus {
    outline: none;
    border-color: #8c0505;
    box-shadow: 0 0 0 3px rgba(255,193,7,0.25);
}

.register-btn {
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

.register-btn:hover {
    background: #a77575;
    transform: translateY(-2px);
}

.login-link {
    margin-top: 20px;
}

.login-link a {
    color: #8c0505;
    text-decoration: none;
    font-weight: bold;
}

.login-link a:hover {
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

    .register-card {
        width: 90%;
        padding: 30px 25px;
    }

    .register-card h1 {
        font-size: 32px;
    }

}

</style>

</head>
<body>

<div class="register-container">

    <div class="register-card">

        <h1>Create Account</h1>
        <p class="subtitle">Create your account to start shopping</p>

        <form action="register_process.php" method="POST">

            <input
                type="text"
                name="fullname"
                placeholder="Full Name"
                required
            >

            <input
                type="email"
                name="email"
                placeholder="Email Address"
                required
            >

            <input
                type="password"
                name="password"
                placeholder="Password"
                required
            >

            <button type="submit" class="register-btn">
                Register
            </button>

        </form>

        <div class="login-link">
            Already have an account?
            <a href="login.php">Login</a>
        </div>

        <a href="../index.php" class="back-home">
            ← Back to Home
        </a>

    </div>

</div>

</body>
</html>