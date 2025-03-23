
<!-- <!DOCTYPE html>
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
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>ADmin Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang, <?= $nama ?></h1>
        <a href="/auth/logout" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>