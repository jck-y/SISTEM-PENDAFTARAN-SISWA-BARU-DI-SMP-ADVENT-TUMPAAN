<!DOCTYPE html>
<html>
<head>
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detail Siswa</h1>
        <a href="/admin/siswa" class="btn btn-primary mb-3">Kembali ke Daftar Siswa</a>

        <!-- Informasi Siswa -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Informasi Siswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td><?= esc($siswa['nama_lengkap']) ?></td>
                            </tr>
                            <tr>
                                <th>Nama Panggilan</th>
                                <td><?= esc($siswa['nama_panggilan']) ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Induk</th>
                                <td><?= esc($siswa['nomor_induk']) ?></td>
                            </tr>
                            <tr>
                                <th>NISN</th>
                                <td><?= esc($siswa['nisn']) ?></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td><?= esc($siswa['tempat_lahir']) ?>, <?= date('d-m-Y', strtotime($siswa['tanggal_lahir'])) ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= esc($siswa['jenis_kelamin']) ?></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td><?= esc($siswa['agama']) ?></td>
                            </tr>
                            <tr>
                                <th>Anak Ke</th>
                                <td><?= esc($siswa['anak_ke']) ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($siswa['alamat_siswa']) ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?= esc($siswa['telepon_siswa']) ?></td>
                            </tr>
                            <tr>
                                <th>Asal TK</th>
                                <td><?= esc($siswa['nama_tk_asal']) ?></td>
                            </tr>
                            <tr>
                                <th>Alamat TK</th>
                                <td><?= esc($siswa['alamat_tk_asal']) ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge <?= $siswa['status'] == 'Diterima' ? 'bg-success' : ($siswa['status'] == 'Ditolak' ? 'bg-danger' : 'bg-warning') ?>">
                                        <?= esc($siswa['status']) ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <?php if ($siswa['gambar'] && file_exists(ROOTPATH . 'public/uploads/' . $siswa['gambar'])): ?>
                            <img src="/uploads/<?= esc($siswa['gambar']) ?>" alt="Foto Siswa" class="img-fluid rounded" style="max-height: 300px;">
                        <?php else: ?>
                            <div class="alert alert-info">Foto siswa tidak tersedia</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Orang Tua -->
        <?php if ($orang_tua): ?>
        <div class="card mb-4">
            <div class="card-header">
                <h4>Informasi Orang Tua Kandung</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Data Ayah</h5>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?= esc($orang_tua['nama_ayah']) ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($orang_tua['alamat_ayah']) ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($orang_tua['pekerjaan_ayah']) ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($orang_tua['pendidikan_ayah']) ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td><?= esc($orang_tua['penghasilan_ayah']) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Data Ibu</h5>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?= esc($orang_tua['nama_ibu']) ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($orang_tua['alamat_ibu']) ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($orang_tua['pekerjaan_ibu']) ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($orang_tua['pendidikan_ibu']) ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td><?= esc($orang_tua['penghasilan_ibu']) ?></td> <!-- Perbaiki typo 'penghasilen_ibu' -->
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Telepon: </strong><?= esc($orang_tua['telepon_hp']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Informasi Wali -->
        <?php if ($wali): ?>
        <div class="card mb-4">
            <div class="card-header">
                <h4>Informasi Wali</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Data Ayah Wali</h5>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?= esc($wali['nama_ayah_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($wali['alamat_ayah_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($wali['pekerjaan_ayah_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($wali['pendidikan_ayah_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td><?= esc($wali['penghasilan_ayah_wali']) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Data Ibu Wali</h5>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?= esc($wali['nama_ibu_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($wali['alamat_ibu_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($wali['pekerjaan_ibu_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($wali['pendidikan_ibu_wali']) ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td><?= esc($wali['penghasilan_ibu_wali']) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Telepon: </strong><?= esc($wali['telepon_hp']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>