<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://static.vecteezy.com/system/resources/previews/009/006/369/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            overflow: auto;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            filter: blur(10px);
            z-index: -1;
        }

        body::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 47, 135, 0.5); /* Overlay biru tua (#002F87) dengan opacity */
            z-index: -1;
        }

        .container {
            background: rgba(0, 47, 135, 0.9); /* Background semi-transparan dengan #002F87 */
            backdrop-filter: blur(10px); /* Efek glassmorphism */
            border-radius: 15px;
            padding: 30px;
            max-width: 600px;
            width: 90%;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
        }

        .logo {
            width: 100px;
            margin-bottom: 15px;
            filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.3));
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #FFC107; /* Warna kuning untuk aksen */
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .status {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px 20px;
            border-radius: 10px;
            font-weight: bold;
            width: 100%;
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 2px solid #FFC107; /* Border kuning */
        }

        .status:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .status i {
            font-size: 20px;
            color: #FFC107; /* Ikon berwarna kuning */
        }

        .status-pending {
            background-color: #007bff;
            color: white;
        }

        .status-diproses {
            background-color: #FFD63A;
            color: white;
        }

        .status-diterima {
            background-color: #28a745;
            color: white;
        }

        .status-ditolak {
            background-color: #dc3545;
            color: white;
        }

        .status h3 {
            font-size: 1.2em;
            margin: 0;
            line-height: 1.4;
        }

        .logout-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #002F87; /* Warna biru tua */
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            border: 2px solid #FFC107; /* Border kuning */
        }

        .logout-btn:hover {
            background-color: #FFC107; /* Warna kuning saat hover */
            color: #002F87;
            transform: scale(1.05);
        }

        /* Styling untuk data diri siswa */
        .profile-section {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #FFC107; /* Border kuning */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .profile-picture:hover {
            transform: scale(1.05);
        }

        .data-card {
            background: rgba(255, 255, 255, 0.1); /* Background semi-transparan putih */
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .data-card:hover {
            transform: translateY(-5px);
        }

        .data-card h2 {
            font-size: 20px;
            color: #FFC107;
            margin-bottom: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 10px;
        }

        .data-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 5px 0;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
        }

        .data-row:last-child {
            border-bottom: none;
        }

        .data-label {
            font-weight: bold;
            color: #FFC107;
            flex: 1;
        }

        .data-value {
            color: white;
            flex: 2;
            text-align: right;
        }

        /* Responsivitas */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                width: 95%;
            }

            h1 {
                font-size: 24px;
            }

            .status {
                padding: 10px 15px;
            }

            .status h3 {
                font-size: 1em;
            }

            .logout-btn {
                padding: 10px 20px;
                font-size: 14px;
            }

            .profile-picture {
                width: 120px;
                height: 120px;
            }

            .data-card {
                padding: 15px;
            }

            .data-card h2 {
                font-size: 18px;
            }

            .data-row {
                flex-direction: column;
                gap: 5px;
            }

            .data-label,
            .data-value {
                text-align: left;
                flex: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" class="logo">
        <h1>Selamat Datang, <?= esc($nama_lengkap ?? 'Pengguna') ?>!</h1>
        <?php
        $statusLower = strtolower($status ?? 'pending');
        $icon = '';
        $message = '';

        if ($statusLower === 'pending') {
            $icon = '<i class="fas fa-clock"></i>';
            $message = "Status Anda saat ini: Pending. Silakan menunggu proses pendaftaran.";
        } elseif ($statusLower === 'diproses') {
            $icon = '<i class="fas fa-spinner fa-spin"></i>';
            $message = "Pendaftaran Anda sedang dalam proses peninjauan. Mohon bersabar menunggu keputusan dari pihak sekolah.";
        } elseif ($statusLower === 'diterima') {
            $icon = '<i class="fas fa-check-circle"></i>';
            $message = "<h3>SELAMAT! ANDA DINYATAKAN LULUS SELEKSI MASUK SEKOLAH INI</h3>";
        } elseif ($statusLower === 'ditolak') {
            $icon = '<i class="fas fa-times-circle"></i>';
            $message = "Mohon maaf, Anda belum diterima di sekolah ini. Silakan hubungi pihak sekolah untuk informasi lebih lanjut atau coba lagi di periode berikutnya.";
        } else {
            $icon = '<i class="fas fa-info-circle"></i>';
            $message = "Status: " . esc($statusLower);
        }
        ?>
        <div class="status status-<?= esc($statusLower) ?>">
            <?= $icon ?>
            <span><?= $message ?></span>
        </div>

        <?php if ($statusLower === 'diterima'): ?>
            <div class="profile-section">
                <!-- Foto Profil -->
                <?php if (!empty($siswa['gambar'])): ?>
                    <img src="<?= base_url($siswa['gambar']) ?>" alt="Foto Profil" class="profile-picture">
                <?php else: ?>
                    <img src="https://via.placeholder.com/150?text=No+Image" alt="Foto Profil" class="profile-picture">
                <?php endif; ?>

                <!-- Data Diri Siswa -->
                <div class="data-card">
                    <h2>Data Diri Siswa</h2>
                    <div class="data-row">
                        <span class="data-label">Nomor Induk</span>
                        <span class="data-value"><?= esc($siswa['nomor_induk'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">NISN</span>
                        <span class="data-value"><?= esc($siswa['nisn'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Jenis Kelamin</span>
                        <span class="data-value"><?= esc($siswa['jenis_kelamin'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Tempat Lahir</span>
                        <span class="data-value"><?= esc($siswa['tempat_lahir'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Tanggal Lahir</span>
                        <span class="data-value"><?= esc($siswa['tanggal_lahir'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Agama</span>
                        <span class="data-value"><?= esc($siswa['agama'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Anak Ke-</span>
                        <span class="data-value"><?= esc($siswa['anak_ke'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Alamat</span>
                        <span class="data-value"><?= esc($siswa['alamat_siswa'] ?? '-') ?></span>
                    </div>
                    <div class="data-row">
                        <span class="data-label">Nomor Telepon</span>
                        <span class="data-value"><?= esc($siswa['telepon_siswa'] ?? '-') ?></span>
                    </div>
                </div>

                <!-- Data Orang Tua -->
                <div class="data-card">
                    <h2>Data Orang Tua</h2>
                    <?php if (!empty($wali)): ?>
                        <div class="data-row">
                            <span class="data-label">Nama Ayah</span>
                            <span class="data-value"><?= esc($wali['nama_ayah_wali'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Alamat Ayah</span>
                            <span class="data-value"><?= esc($wali['alamat_ayah_wali'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Nama Ibu</span>
                            <span class="data-value"><?= esc($wali['nama_ibu_wali'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Alamat Ibu</span>
                            <span class="data-value"><?= esc($wali['alamat_ibu_wali'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Nomor Telepon</span>
                            <span class="data-value"><?= esc($wali['telepon_hp'] ?? '-') ?></span>
                        </div>
                    <?php elseif (!empty($orang_tua)): ?>
                        <div class="data-row">
                            <span class="data-label">Nama Ayah</span>
                            <span class="data-value"><?= esc($orang_tua['nama_ayah'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Alamat Ayah</span>
                            <span class="data-value"><?= esc($orang_tua['alamat_ayah'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Nama Ibu</span>
                            <span class="data-value"><?= esc($orang_tua['nama_ibu'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Alamat Ibu</span>
                            <span class="data-value"><?= esc($orang_tua['alamat_ibu'] ?? '-') ?></span>
                        </div>
                        <div class="data-row">
                            <span class="data-label">Nomor Telepon</span>
                            <span class="data-value"><?= esc($orang_tua['telepon_hp'] ?? '-') ?></span>
                        </div>
                    <?php else: ?>
                        <div class="data-row">
                            <span class="data-label">Data Orang Tua</span>
                            <span class="data-value">Belum tersedia</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <a href="<?= base_url('/auth/logout') ?>" class="logout-btn">Logout</a>
    </div>
</body>
</html>