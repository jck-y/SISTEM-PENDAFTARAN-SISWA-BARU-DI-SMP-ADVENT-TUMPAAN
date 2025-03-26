<!DOCTYPE html>
<html>
<head>
    <title>Admin Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang, <?= $nama ?></h1>
        <a href="/auth/logout" class="btn btn-danger mb-3">Logout</a>

        <!-- Pesan Sukses -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Tabel Siswa -->
        <h2>Daftar Siswa</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $s): ?>
                <tr>
                    <td><?= $s['id_siswa'] ?></td>
                    <td><?= $s['nama_lengkap'] ?></td>
                    <td><?= $s['nisn'] ?></td>
                    <td>
                        <form action="/admin/set_password_siswa/<?= $s['id_siswa'] ?>" method="post" class="d-inline">
                            <input type="text" name="password" value="<?= $s['password'] ?>" class="form-control d-inline w-auto" placeholder="Masukkan password">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/delete_siswa/<?= $s['id_siswa'] ?>" method="post" class="d-inline">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Tabel Kepala Sekolah -->
        <h2>Daftar Kepala Sekolah</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kepsek as $k): ?>
                <tr>
                    <td><?= $k['id'] ?></td>
                    <td><?= $k['nama'] ?></td>
                    <td>
                        <form action="/admin/set_password_kepsek/<?= $k['id'] ?>" method="post" class="d-inline">
                            <input type="text" name="password" value="<?= $k['password'] ?>" class="form-control d-inline w-auto" placeholder="Masukkan password">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/delete_kepsek/<?= $k['id'] ?>" method="post" class="d-inline">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kepsek ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Form Tambah Kepsek -->
        <h3>Tambah Kepala Sekolah</h3>
        <form action="/admin/add_kepsek" method="post">
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Kepsek" required>
            </div>
            <div class="mb-3">
                <input type="text" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>

        <!-- Tabel Operator -->
        <h2>Daftar Operator</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($operator as $o): ?>
                <tr>
                    <td><?= $o['id'] ?></td>
                    <td><?= $o['nama'] ?></td>
                    <td>
                        <form action="/admin/set_password_operator/<?= $o['id'] ?>" method="post" class="d-inline">
                            <input type="text" name="password" value="<?= $o['password'] ?>" class="form-control d-inline w-auto" placeholder="Masukkan password">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/delete_operator/<?= $o['id'] ?>" method="post" class="d-inline">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus operator ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Form Tambah Operator -->
        <h3>Tambah Operator</h3>
        <form action="/admin/add_operator" method="post">
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama Operator" required>
            </div>
            <div class="mb-3">
                <input type="text" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
</body>
</html> 