<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepsek Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #1a49d4;
            font-size: 16px;
            font-weight: bold;
            background-color: #ffffff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .menu {
            cursor: pointer;
            height: 40px;
            width: 40px;
            transition: transform 0.3s ease;
        }

        .menu:hover {
            transform: rotate(90deg);
        }

        /* Search Bar */
        .search-container {
            display: flex;
            align-items: center;
            margin: 20px 0;
            border: 2px solid #ccc;
            border-radius: 25px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .search-container:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .search-container input {
            width: 100%;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            background: none;
        }

        .search-container input:focus {
            outline: none;
        }

        .icsearch {
            cursor: pointer;
            padding: 10px 15px;
            height: 24px;
            width: 24px;
        }

        /* Table */
        .table-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        th {
            color: #1a49d4;
            font-weight: bold;
            background-color: #f8f9fc;
        }

        td a {
            color: #1a49d4;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        td a:hover {
            color: #ff5733;
            text-decoration: underline;
        }

        tr {
            transition: background-color 0.3s ease;
        }

        tr:hover {
            background-color: #f5f7fa;
        }

        /* Nomor Urut */
        .number {
            display: inline-block;
            width: 30px;
            text-align: center;
            color: #666;
            font-weight: bold;
        }

        /* Sidenav */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        /* Status Label */
        .status-label {
            display: inline-block;
            padding: 8px 12px;
            font-weight: bold;
            border-radius: 5px;
            color: white;
            text-align: center;
            min-width: 100px;
        }

        .status-diproses {
            background-color: #ffc107; /* Kuning */
        }

        .status-diterima {
            background-color: #28a745; /* Hijau */
        }

        .status-ditolak {
            background-color: #dc3545; /* Merah */
        }

        /* Flash Messages */
        .flash-message {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
        }

        .flash-message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .flash-message.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .container {
                padding: 10px;
            }

            header {
                font-size: 20px;
            }

            .menu {
                height: 30px;
                width: 30px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>KEPALA SEKOLAH</h1>
            <img class="menu" src="<?= base_url('assets/menu.png'); ?>" onclick="openNav()"/>
        </header>

        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash-message success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="flash-message error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <!-- Search Bar -->
        <form action="<?= base_url('kepsek'); ?>" method="get">
            <div class="search-container">
                <input type="text" name="search" placeholder="Cari nama siswa..." 
                       value="<?= esc($search ?? ''); ?>">
                <button type="submit" style="background:none;border:none;padding:0;">
                    <img class="icsearch" src="<?= base_url('assets/search.png'); ?>" alt="search">
                </button>
            </div>
        </form>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($siswa)): ?>
                        <?php $no = 1; foreach ($siswa as $s): ?>
                            <tr>
                                <td><span class="number"><?= $no++ ?></span></td>
                                <td><a href="<?= base_url('kepsek/detail_siswa/' . $s['id_siswa']) ?>"><?= esc($s['nama_lengkap']) ?></a></td>
                                <td>
                                    <span class="status-label 
                                        <?= ($s['status'] == 'Diterima') ? 'status-diterima' : 
                                            ($s['status'] == 'Ditolak' ? 'status-ditolak' : 'status-diproses') ?>">
                                        <?= strtoupper($s['status']) ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" style="text-align: center; padding: 20px;">
                                <?php if ($search): ?>
                                    Data siswa dengan nama "<?= esc($search) ?>" tidak ditemukan
                                <?php else: ?>
                                    Belum ada data siswa
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sidenav -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="<?= base_url('auth/logout'); ?>">LOGOUT</a>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>