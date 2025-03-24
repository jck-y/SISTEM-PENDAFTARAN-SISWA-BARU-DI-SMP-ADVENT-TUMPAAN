<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Operator Dashboard</title>
</head>
<body>
    <h1>Welcome, Operator <?= session()->get('username'); ?>!</h1>
    <p>This is the operator dashboard.</p>
    <a href="<?= site_url('logout'); ?>">Logout</a>
=======
<html>
<head>
    <title>Dashboard Operator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat Datang Operator, <?= $nama ?></h1>
        <a href="/auth/logout" class="btn btn-danger mb-3">Logout</a>

        <div class="card">
            <div class="card-header">
                <h4>Daftar Siswa</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nomor Induk</th>
                            <th>NISN</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($siswa)): ?>
                            <?php $no = 1; foreach($siswa as $s): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><a href="/siswa/detail/<?= $s['id_siswa'] ?>"><?= esc($s['nama_lengkap']) ?></a></td>
                                <td><?= $s['nomor_induk'] ?></td>
                                <td><?= $s['nisn'] ?></td>
                                <td>
                                    <form action="/operator/update_status" method="post" class="d-inline">
                                        <input type="hidden" name="id_siswa" value="<?= $s['id_siswa'] ?>">
                                        <select name="status" class="form-select d-inline w-auto" onchange="this.form.submit()">
                                            <option value="Diproses" <?= $s['status'] == 'Diproses' ? 'selected' : '' ?> class="bg-warning text-dark">Diproses</option>
                                            <option value="Diterima" <?= $s['status'] == 'Diterima' ? 'selected' : '' ?> class="bg-success text-white">Diterima</option>
                                            <option value="Ditolak" <?= $s['status'] == 'Ditolak' ? 'selected' : '' ?> class="bg-danger text-white">Ditolak</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Belum ada data siswa</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
>>>>>>> e61af0fd77bd78850e9a95fa31223e874e591e39
</body>
</html>