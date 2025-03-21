<!-- <!DOCTYPE html>
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
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Kepala Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datangsfsf, <?= $nama ?></h1>
        <a href="/auth/logout" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>