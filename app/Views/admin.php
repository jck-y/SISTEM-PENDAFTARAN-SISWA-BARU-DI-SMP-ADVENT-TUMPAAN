<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - CodeIgniter 4</title>
</head>
<body>
    <h1>Welcome, <?= session()->get('username'); ?>!</h1>
    <p>This is the admin page.</p>
    <a href="<?= site_url('logout'); ?>">Logout</a>
</body>
</html>