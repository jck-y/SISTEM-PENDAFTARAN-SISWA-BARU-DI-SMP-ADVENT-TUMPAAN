<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            background-color: #f4f6f9;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 20px;
        }

        h1 {
            color: #1a49d4;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Card Styles */
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            background-color: #fff;
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-header {
            background-color: #1a49d4;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 12px 12px 0 0;
            padding: 15px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 0;
        }

        th {
            background-color: #e8f0fe;
            font-weight: bold;
            color: #1a49d4;
            padding: 10px;
        }

        td {
            color: #555;
            padding: 10px;
        }

        /* Badge Status */
        .badge {
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 20px;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #1a49d4;
            border: none;
            padding: 10px 15px;
            font-weight: bold;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background-color: #143ca3;
        }

        /* Image and Document Styling */
        .img-fluid {
            border-radius: 10px;
            border: 2px solid #1a49d4;
            max-width: 100%;
            height: auto;
        }

        .document-img {
            max-height: 150px;
            object-fit: cover;
        }

        .pdf-icon {
            font-size: 50px;
            color: #ff4444;
            text-align: center;
            margin-bottom: 10px;
        }

        .document-card {
            text-align: center;
        }

        .document-card a {
            color: #1a49d4;
            font-weight: bold;
            text-decoration: none;
        }

        .document-card a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                max-width: 100%;
                padding: 15px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }

            .table {
                font-size: 14px;
            }

            .img-fluid, .document-img {
                width: 100%;
                max-height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Detail Siswa</h1>
        <a href="<?= $role == 'kepsek' ? base_url('kepsek') : ($role == 'operator' ? base_url('operator') : base_url('admin/siswa')) ?>" class="btn btn-primary mb-3">Kembali ke Daftar Siswa</a>

        <!-- Informasi Siswa -->
        <?php if (!empty($siswa)): ?>
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
                                <td><?= esc($siswa['nama_lengkap'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Nama Panggilan</th>
                                <td><?= esc($siswa['nama_panggilan'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Induk</th>
                                <td><?= esc($siswa['nomor_induk'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>NISN</th>
                                <td><?= esc($siswa['nisn'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>
                                    <?= esc($siswa['tempat_lahir'] ?? '-') ?>, 
                                    <?= isset($siswa['tanggal_lahir']) ? date('d-m-Y', strtotime($siswa['tanggal_lahir'])) : '-' ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td><?= esc($siswa['jenis_kelamin'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <td><?= esc($siswa['agama'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Anak Ke</th>
                                <td><?= esc($siswa['anak_ke'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($siswa['alamat_siswa'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?= esc($siswa['telepon_siswa'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Asal TK</th>
                                <td><?= esc($siswa['nama_tk_asal'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Alamat TK</th>
                                <td><?= esc($siswa['alamat_tk_asal'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge <?= $siswa['status'] == 'Diterima' ? 'bg-success' : ($siswa['status'] == 'Ditolak' ? 'bg-danger' : 'bg-warning') ?>">
                                        <?= esc($siswa['status'] ?? 'Belum Diproses') ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <?php if (!empty($siswa['gambar']) && file_exists(ROOTPATH . 'public/uploads/' . $siswa['gambar'])): ?>
                            <img src="<?= base_url('uploads/' . $siswa['gambar']) ?>" alt="Foto Siswa" class="img-fluid rounded">
                        <?php else: ?>
                            <div class="alert alert-info">Foto siswa tidak tersedia</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Orang Tua -->
        <?php if (!empty($orang_tua)): ?>
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
                                <td><?= esc($orang_tua['nama_ayah'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($orang_tua['alamat_ayah'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($orang_tua['pekerjaan_ayah'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($orang_tua['pendidikan_ayah'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td>Rp. <?= isset($orang_tua['penghasilan_ayah']) ? number_format($orang_tua['penghasilan_ayah'], 0, ',', '.') : '-' ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Data Ibu</h5>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?= esc($orang_tua['nama_ibu'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($orang_tua['alamat_ibu'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($orang_tua['pekerjaan_ibu'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($orang_tua['pendidikan_ibu'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td>Rp. <?= isset($orang_tua['penghasilan_ibu']) ? number_format($orang_tua['penghasilan_ibu'], 0, ',', '.') : '-' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Telepon:</strong> <?= esc($orang_tua['telepon_hp'] ?? '-') ?>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="alert alert-warning">Data orang tua tidak tersedia</div>
        <?php endif; ?>

        <!-- Informasi Wali -->
        <?php if (!empty($wali)): ?>
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
                                <td><?= esc($wali['nama_ayah_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($wali['alamat_ayah_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($wali['pekerjaan_ayah_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($wali['pendidikan_ayah_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td>Rp. <?= isset($wali['penghasilan_ayah_wali']) ? number_format($wali['penghasilan_ayah_wali'], 0, ',', '.') : '-' ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Data Ibu Wali</h5>
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?= esc($wali['nama_ibu_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td><?= esc($wali['alamat_ibu_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td><?= esc($wali['pekerjaan_ibu_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Pendidikan</th>
                                <td><?= esc($wali['pendidikan_ibu_wali'] ?? '-') ?></td>
                            </tr>
                            <tr>
                                <th>Penghasilan</th>
                                <td>Rp. <?= isset($wali['penghasilan_ibu_wali']) ? number_format($wali['penghasilan_ibu_wali'], 0, ',', '.') : '-' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <strong>Telepon:</strong> <?= esc($wali['telepon_hp'] ?? '-') ?>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="alert alert-warning">Data wali tidak tersedia</div>
        <?php endif; ?>

        <!-- Dokumen Siswa -->
        <div class="card mb-4">
            <div class="card-header">
                <h4>Dokumen Siswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php 
                    $documents = [
                        ['key' => 'gambar', 'label' => 'Foto Siswa'],
                        ['key' => 'kk', 'label' => 'Kartu Keluarga'],
                        ['key' => 'akta', 'label' => 'Akta Kelahiran'],
                        ['key' => 'raport', 'label' => 'Raport'],
                        ['key' => 'skl', 'label' => 'Surat Keterangan Lulus']
                    ];
                    foreach ($documents as $doc): ?>
                        <div class="col-md-4 col-sm-6 mb-3 document-card">
                            <h5><?= $doc['label'] ?></h5>
                            <?php if (!empty($siswa[$doc['key']]) && file_exists(ROOTPATH . 'public/uploads/' . $siswa[$doc['key']])): ?>
                                <?php if (in_array(pathinfo($siswa[$doc['key']], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])): ?>
                                    <img src="<?= base_url('uploads/' . $siswa[$doc['key']]) ?>" alt="<?= $doc['label'] ?>" class="document-img img-fluid">
                                <?php else: ?>
                                    <div class="pdf-icon">📄</div>
                                <?php endif; ?>
                                <p><a href="<?= base_url('uploads/' . $siswa[$doc['key']]) ?>" target="_blank">Lihat File</a></p>
                            <?php else: ?>
                                <div class="alert alert-info">Dokumen tidak tersedia</div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php else: ?>
            <div class="alert alert-danger">Data siswa tidak ditemukan</div>
        <?php endif; ?>
    </div>
</body>
</html>