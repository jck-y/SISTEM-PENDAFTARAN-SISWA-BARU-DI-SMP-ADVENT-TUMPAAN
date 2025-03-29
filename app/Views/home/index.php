<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background: url('https://static.vecteezy.com/system/resources/previews/009/006/369/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
            background-size: cover;
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
        .container {
            background: #2148C0;
            color: white;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .status {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
        .status-diproses {
            background-color: #FFC107; /* Kuning */
            color: #002F87;
        }
        .status-diterima {
            background-color: #28a745; /* Hijau */
        }
        .status-ditolak {
            background-color: #dc3545; /* Merah */
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #002F87;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
        }
        .logout-btn:hover {
            background-color: #FFC107;
            color: #002F87;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <?= esc($nama_lengkap) ?>!</h1>
        <p>Ini adalah halaman home untuk siswa.</p>
        <div class="status <?= 'status-' . strtolower($status) ?>">
            Status: <?= esc($status) ?>
        </div>
        <br>
        <a href="<?= base_url('/auth/logout') ?>" class="logout-btn">Logout</a>
    </div>
</body>
</html>