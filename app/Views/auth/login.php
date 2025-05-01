<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: url('https://static.vecteezy.com/system/resources/previews/009/006/369/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            filter: blur(10px);
            z-index: -1;
        }

        .form-wrapper {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header img {
            width: 60px;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .form-header img:hover {
            transform: scale(1.1);
        }

        .form-header h2 {
            color: #2148C0;
            font-size: 24px;
            margin: 0;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }


        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 12px 1px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #2148C0;
            box-shadow: 0 0 5px rgba(33, 72, 192, 0.3);
        }

        .form-group i {
            position: absolute;
            right: 15px;
            top: 70%;
            transform: translateY(-50%);
            color: #999;
        }

        .button-group {
            text-align: center;
            margin-top: 20px;
        }

        .button-group button {
            padding: 12px 30px;
            background-color: #2148C0;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button-group button:hover {
            background-color: #FFC107;
            transform: translateY(-2px);
        }

        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-size: 14px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link p {
            color: #555;
            font-size: 14px;
        }

        .link a {
            color: #2148C0;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .link a:hover {
            color: #FFC107;
            text-decoration: underline;
        }

        /* Responsivitas */
        @media screen and (max-width: 480px) {
            .form-wrapper {
                padding: 20px;
                max-width: 90%;
            }

            .form-header h2 {
                font-size: 20px;
            }

            .form-group input, 
            .form-group select {
                padding: 10px 35px 10px 12px;
                font-size: 14px;
            }

            .button-group button {
                padding: 10px 25px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <div class="form-header">
            <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" width="50">
            <h2>Login</h2>
        </div>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert">
                <p><?= esc(session()->getFlashdata('error')) ?></p>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('auth/login') ?>" method="post">
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="siswa">Siswa</option>
                    <option value="admin">Admin</option>
                    <option value="operator">Operator</option>
                    <option value="kepsek">Kepsek</option>
                </select>
                <i class="fas fa-user-tag"></i>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= old('username') ?>" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="button-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="link">
            <p>Belum punya akun siswa? <a href="<?= base_url('auth/register') ?>">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>