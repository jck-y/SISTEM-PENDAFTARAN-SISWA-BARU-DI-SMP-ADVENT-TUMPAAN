<?php
// filepath: c:\Users\j13ka\OneDrive\Desktop\New folder\SISTEM-PENDAFTARAN-SISWA-BARU-DI-SMP-ADVENT-TUMPAAN\app\Views\login.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - CodeIgniter 4</title>
    <meta name="description" content="Login to your account">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->
    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }
        *:focus {
            background-color: rgba(221, 72, 20, .2);
            outline: none;
        }
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f7f8f9;
        }
        .login-form h2 {
            margin-bottom: 1rem;
        }
        .login-form label {
            display: block;
            margin-bottom: .5rem;
        }
        .login-form input {
            width: 100%;
            padding: .5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-form button {
            width: 100%;
            padding: .5rem;
            background-color: #dd4814;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
        }
        .login-form button:hover {
            background-color: #c43d0e;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        <form action="<?= site_url('login/process'); ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>