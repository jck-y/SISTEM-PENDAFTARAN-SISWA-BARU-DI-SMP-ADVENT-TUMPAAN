<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://static.vecteezy.com/system/resources/previews/009/006/369/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
            background-size: cover;
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
        .container {
            background: #2148C0;
            color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px; /* Lebar maksimum */
            margin: 20px; /* Margin aman di kanan-kiri pada layar kecil */
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
        }
        .status {
            margin-top: 20px;
            padding: 15px; /* Padding seimbang di semua sisi */
            border-radius: 5px;
            font-weight: bold;
            display: block; /* Mengubah dari inline-block ke block agar memenuhi lebar */
            text-align: center;
            width: 100%; /* Memastikan lebar penuh */
            box-sizing: border-box; /* Memastikan padding tidak menambah lebar */
        }
        .status-diproses {
            background-color: #FFC107; /* Kuning */
            color: #002F87;
        }
        .status-diterima {
            background-color: #28a745; /* Hijau */
        }
        .status-ditolak {
            background-color: #dc3545; /* Merah */
        }
        .status-diterima h2 {
            font-size: 1.5em;
            margin: 0;
            line-height: 1.2;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #002F87;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
        }
        .logout-btn:hover {
            background-color: #FFC107;
            color: #002F87;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" class="logo" width="80">
        <h1>Selamat Datang, <?= esc($nama_lengkap) ?>!</h1>
        <?php
        $statusLower = strtolower($status);
        if ($statusLower === 'diterima') {
            $message = "<h3>SELAMAT! ANDA DINYATAKAN LULUS SELEKSI MASUK SEKOLAH INI</h3>";
        } elseif ($statusLower === 'diproses') {
            $message = "Mohon bersabar, pihak sekolah masih memproses pendaftaran Anda. Kami akan segera memberi kabar lebih lanjut.";
        } elseif ($statusLower === 'ditolak') {
            $message = "Mohon maaf, Anda belum diterima di sekolah ini. Silakan hubungi pihak sekolah untuk informasi lebih lanjut atau coba lagi di periode berikutnya.";
        } else {
            $message = "Status: " . esc($status);
        }
        ?>
        <div class="status <?= 'status-' . $statusLower ?>">
            <?= $message ?>
        </div>
        <a href="<?= base_url('/auth/logout') ?>" class="logout-btn">Logout</a>
    </div>
</body>
</html>