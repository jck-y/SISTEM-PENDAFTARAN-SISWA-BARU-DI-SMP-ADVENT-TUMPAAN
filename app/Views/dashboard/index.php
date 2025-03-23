<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat Datang, <?= session()->get('nama') ?></h2>
    <p>Anda login sebagai: <?= session()->get('role') ?></p>
    <a href="<?= base_url('logout') ?>">Logout</a>
</body>
</html>
