<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Operator Dashboard</title>
</head>
<body>
    <h1>Welcome, Operator <?= session()->get('username'); ?>!</h1>
    <p>This is the operator dashboard.</p>
    <a href="<?= site_url('logout'); ?>">Logout</a>
</body>
</html>