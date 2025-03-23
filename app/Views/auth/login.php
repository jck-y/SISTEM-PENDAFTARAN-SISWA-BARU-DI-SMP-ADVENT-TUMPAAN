<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://static.vecteezy.com/system/resources/previews/009/006/369/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        body::before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 220%;
            background: inherit;
            filter: blur(10px); 
            z-index: -1; 
        }
        .login-container {
            background:#2148C0;
            color: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .form-control {
            background: transparent;
            border: 2px solid white;
            color: white;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-control:focus {
            background: transparent;
            border-color: #FFC107;
            color: white;
        }
        .btn-primary {
            background: white;
            color: #002F87;
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background: #FFC107;
            color: #002F87;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" class="img-fluid mx-auto d-block" width="100">
        <h4 class="mt-3">Login</h4>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="<?= base_url('/auth/login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3 input-group">
                <span class="input-group-text bg-transparent border-white text-white"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="nama" placeholder="Username" required>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text bg-transparent border-white text-white"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <!-- Tombol Register di luar form login -->
        <!-- <form action="<?= base_url('/register') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary w-100 mt-2">Register</button>
        </form> -->

        <a href="<?= base_url('/siswa') ?>" class="btn btn-primary w-100 mt-2">Register</a>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
