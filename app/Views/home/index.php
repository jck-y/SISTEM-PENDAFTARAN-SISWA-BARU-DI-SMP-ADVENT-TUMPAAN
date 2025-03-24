<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang Siswa, <?= $nama ?></h1>
        <a href="/auth/logout" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>