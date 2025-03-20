<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang, <?= $nama ?></h1>
        <p>Role: <?= $role ?></p>
        <a href="/auth/logout" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>