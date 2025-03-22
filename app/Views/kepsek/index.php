<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kepala Sekolah Dashboard</title>
</head>
<body>
    <h1>Welcome, Kepala Sekolah <?= session()->get('username'); ?>!</h1>
    <p>This is the kepala sekolah dashboard.</p>
    <a href="<?= site_url('logout'); ?>">Logout</a>
</body>
</html>