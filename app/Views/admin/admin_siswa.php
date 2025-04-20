<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Siswa</title>
    <style>
        /* Import Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f4f7fc;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            flex: 1;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #1a49d4;
            font-size: 26px;
            font-weight: 600;
            padding: 15px 20px;
            background: linear-gradient(135deg, #ffffff, #e8ecef);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .menu {
            cursor: pointer;
            height: 40px;
            width: 40px;
            transition: transform 0.3s ease;
        }

        .menu:hover {
            transform: scale(1.1);
        }

        /* Search Bar */
        .search-container {
            display: flex;
            align-items: center;
            margin: 20px 0;
            border: 2px solid #d1d5db;
            border-radius: 8px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .search-container:hover,
        .search-container:focus-within {
            border-color: #1a49d4;
        }

        .search-container input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px 0 0 8px;
        }

        .search-container input:focus {
            outline: none;
        }

        .search-container button {
            padding: 12px;
            background-color: #1a49d4;
            border: none;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-container button:hover {
            background-color: #143db3;
        }

        .search-container img {
            height: 20px;
            width: 20px;
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            text-align: left;
            padding: 14px 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            color: #1a49d4;
            font-weight: 600;
            background-color: #f8fafc;
        }

        td {
            color: #333;
            font-weight: 400;
        }

        tr {
            transition: background-color 0.3s ease;
        }

        tr:hover {
            background-color: #f1f5f9;
        }

        .action-cell-changepass,
        .action-cell-delete,
        .action-cell-detail,
        .action-cell-edit {
            padding-left: 20px;
        }

        .action-cell-changepass img,
        .action-cell-delete img,
        .action-cell-detail img,
        .action-cell-edit img {
            height: 24px;
            width: 24px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .action-cell-changepass img:hover,
        .action-cell-delete img:hover,
        .action-cell-detail img:hover,
        .action-cell-edit img:hover {
            transform: scale(1.1);
        }

        /* Floating Add Button */
        .floating-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1a49d4, #3b82f6);
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .floating-button:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #3b82f6, #1a49d4);
        }

        .floating-button img {
            height: 30px;
            width: 30px;
        }

        /* Popup Change Password */
        #overlayChangePass {
            position: fixed;
            display: none;
            width: 90%;
            max-width: 500px;
            padding: 30px;
            background: linear-gradient(135deg, #6c8def, #4b6cd9);
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translate(-50%, -60%); }
            to { opacity: 1; transform: translate(-50%, -50%); }
        }

        .textchangepass {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 20px;
        }

        .inputchangepass {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .inputchangepass input {
            width: 100%;
            max-width: 400px;
            padding: 12px 40px 12px 15px;
            border: none;
            outline: none;
            border-radius: 8px;
            font-size: 16px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .inputchangepass input:focus {
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 3px rgba(26, 73, 212, 0.2);
        }

        .inputchangepass button {
            position: absolute;
            right: 5px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .inputchangepass img {
            width: 24px;
        }

        #overlayChangePass img[alt="close"],
        #overlayDeleteUser img[alt="close"],
        #overlayAddUser img[alt="close"],
        #overlayAddUserSimple img[alt="close"],
        #overlayDetailSiswa img[alt="close"] {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 30px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        #overlayChangePass img[alt="close"]:hover,
        #overlayDeleteUser img[alt="close"]:hover,
        #overlayAddUser img[alt="close"]:hover,
        #overlayAddUserSimple img[alt="close"]:hover,
        #overlayDetailSiswa img[alt="close"]:hover {
            transform: rotate(90deg);
        }

        /* Popup Delete User */
        #overlayDeleteUser {
            position: fixed;
            display: none;
            width: 90%;
            max-width: 400px;
            padding: 30px;
            background: linear-gradient(135deg, #6c8def, #4b6cd9);
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeIn 0.3s ease;
        }

        #overlayDeleteUser h1 {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 20px;
        }

        .optionDelete {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .optionDelete .hapus {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .optionDelete .hapus:hover {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            transform: scale(1.05);
        }

        .optionDelete .tidak {
            background: linear-gradient(135deg, #e5e7eb, #d1d5db);
            color: #333;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .optionDelete .tidak:hover {
            background: linear-gradient(135deg, #d1d5db, #e5e7eb);
            transform: scale(1.05);
        }

        /* Popup Add/Edit User (For Editing Siswa Data) */
        #overlayAddUser {
            position: fixed;
            display: none;
            width: 90%;
            max-width: 700px;
            padding: 30px;
            background: linear-gradient(135deg, #6c8def, #4b6cd9);
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeIn 0.3s ease;
            max-height: 80vh;
            overflow-y: auto;
        }

        #overlayAddUser h1 {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 25px;
        }

        #overlayAddUser h2 {
            font-size: 18px;
            font-weight: 500;
            color: #fff;
            margin-top: 20px;
            margin-bottom: 15px;
            text-align: left;
            text-transform: uppercase;
        }

        #overlayAddUser text {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            text-align: left;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        #overlayAddUser input,
        #overlayAddUser select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        #overlayAddUser input:focus,
        #overlayAddUser select:focus {
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 3px rgba(26, 73, 212, 0.2);
        }

        #overlayAddUser input[type="file"] {
            padding: 8px;
            background-color: #fff;
        }

        #overlayAddUser .submit-btn {
            position: sticky;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease, transform 0.3s ease;
            margin-top: 20px;
            margin-left: auto;
        }

        #overlayAddUser .submit-btn:hover {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            transform: scale(1.1);
        }

        #overlayAddUser .submit-btn img {
            width: 24px;
        }

        /* Popup Add User Simple (Hanya untuk tabel users) */
        #overlayAddUserSimple {
            position: fixed;
            display: none;
            width: 90%;
            max-width: 400px;
            padding: 30px;
            background: linear-gradient(135deg, #6c8def, #4b6cd9);
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeIn 0.3s ease;
        }

        #overlayAddUserSimple h1 {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 25px;
        }

        #overlayAddUserSimple text {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            text-align: left;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        #overlayAddUserSimple input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        #overlayAddUserSimple input:focus {
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 3px rgba(26, 73, 212, 0.2);
        }

        #overlayAddUserSimple .submit-btn {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease, transform 0.3s ease;
            margin-top: 20px;
            margin-left: auto;
        }

        #overlayAddUserSimple .submit-btn:hover {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            transform: scale(1.1);
        }

        #overlayAddUserSimple .submit-btn img {
            width: 24px;
        }

        /* Popup Detail Siswa */
        #overlayDetailSiswa {
            position: fixed;
            display: none;
            width: 90%;
            max-width: 700px;
            padding: 30px;
            background: linear-gradient(135deg, #6c8def, #4b6cd9);
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            text-align: left;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeIn 0.3s ease;
            max-height: 80vh;
            overflow-y: auto;
        }

        #overlayDetailSiswa h1 {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 25px;
            text-align: center;
        }

        #overlayDetailSiswa .detail-row {
            margin-bottom: 15px;
        }

        #overlayDetailSiswa .detail-row label {
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            text-transform: uppercase;
            display: block;
            margin-bottom: 5px;
        }

        #overlayDetailSiswa .detail-row span {
            font-size: 16px;
            color: #e5e7eb;
            display: block;
            padding: 8px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        #overlayDetailSiswa .detail-row img {
            max-width: 150px;
            border-radius: 8px;
            margin-top: 5px;
        }

        /* Sidenav */
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1001;
            top: 0;
            right: 0;
            background: linear-gradient(135deg, #1f2937, #111827);
            overflow-x: hidden;
            transition: width 0.5s ease;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 12px 8px 12px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #9ca3af;
            display: block;
            transition: color 0.3s ease, background 0.3s ease;
        }

        .sidenav a:hover {
            color: #fff;
            background-color: #374151;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .sidenav .closebtn:hover {
            color: #fff;
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                font-size: 20px;
                padding: 10px 15px;
            }

            .menu {
                height: 35px;
                width: 35px;
            }

            .search-container input {
                font-size: 14px;
                padding: 10px;
            }

            .search-container button {
                padding: 10px;
            }

            .search-container img {
                height: 18px;
                width: 18px;
            }

            th, td {
                font-size: 14px;
                padding: 10px;
            }

            .floating-button {
                width: 50px;
                height: 50px;
                bottom: 20px;
                right: 20px;
            }

            .floating-button img {
                height: 25px;
                width: 25px;
            }

            #overlayChangePass,
            #overlayDeleteUser,
            #overlayAddUser,
            #overlayAddUserSimple,
            #overlayDetailSiswa {
                width: 95%;
                padding: 20px;
            }

            .textchangepass,
            #overlayDeleteUser h1,
            #overlayAddUser h1,
            #overlayAddUserSimple h1,
            #overlayDetailSiswa h1 {
                font-size: 18px;
            }

            .inputchangepass input {
                font-size: 14px;
                padding: 10px 35px 10px 12px;
            }

            #overlayAddUser input,
            #overlayAddUser select,
            #overlayAddUserSimple input {
                font-size: 14px;
                padding: 10px;
            }

            #overlayAddUser .submit-btn,
            #overlayAddUserSimple .submit-btn {
                width: 45px;
                height: 45px;
                bottom: 15px;
                right: 15px;
            }

            #overlayAddUser .submit-btn img,
            #overlayAddUserSimple .submit-btn img {
                width: 20px;
            }

            .optionDelete .hapus,
            .optionDelete .tidak {
                font-size: 14px;
                padding: 8px 20px;
            }

            #overlayDetailSiswa .detail-row span {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            header {
                font-size: 18px;
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .menu {
                position: absolute;
                top: 15px;
                right: 15px;
            }

            .table-wrapper {
                margin: 0 -20px;
            }

            th, td {
                font-size: 12px;
                padding: 8px;
            }

            .action-cell-changepass img,
            .action-cell-delete img,
            .action-cell-detail img,
            .action-cell-edit img {
                height: 20px;
                width: 20px;
            }

            .floating-button {
                width: 45px;
                height: 45px;
                bottom: 15px;
                right: 15px;
            }

            .floating-button img {
                height: 22px;
                width: 22px;
            }

            .sidenav a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>ADMIN || DAFTAR SISWA</h1>
            <img class="menu" src="<?= base_url('assets/menu.png'); ?>" onclick="openNav()"/>
        </header>

        <!-- Search Bar -->
        <div class="search-container">
            <form action="<?= base_url('admin/siswa'); ?>" method="get" style="width: 100%; display: flex; align-items: center;">
                <input type="text" name="keyword" placeholder="Cari berdasarkan username..." value="<?= esc($keyword ?? ''); ?>">
                <button type="submit"><img src="<?= base_url('assets/search.png'); ?>" alt="search"></button>
            </form>
        </div>

        <!-- Table -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>CHANGE PASSWORD</th>
                        <th>DELETE USER</th>
                        <th>DETAIL</th>
                        <th>EDIT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr><td colspan="5"><?= $keyword ? "Tidak ada user dengan username '$keyword'" : "Tidak ada data user"; ?></td></tr>
                    <?php else: ?>
                        <?php foreach ($users as $u): ?>
                            <tr>
                                <td><?= esc($u['user']['username']) ?></td>
                                <td class="action-cell-changepass"><img class="changepass" src="<?= base_url('assets/changepass.png'); ?>" alt="Change Password" onclick="onChangePassword(<?= $u['user']['id_user'] ?>)"></td>
                                <td class="action-cell-delete"><img class="deletemail" src="<?= base_url('assets/deletemail.png'); ?>" alt="Delete User" onclick="onDeleteUser(<?= $u['user']['id_user'] ?>)"></td>
                                <td class="action-cell-detail"><img src="<?= base_url('assets/detail.png'); ?>" alt="Detail Siswa" onclick='onDetailSiswa(<?= json_encode($u['siswa']) ?>)'></td>
                                <td class="action-cell-edit"><img src="<?= base_url('assets/edit.png'); ?>" alt="Edit Siswa" onclick='onEditSiswa(<?= json_encode($u['siswa']) ?>, <?= $u['user']['id_user'] ?>, <?= json_encode($u['wali']) ?>, <?= json_encode($u['orang_tua']) ?>)'></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Floating Add Button -->
        <div class="floating-button" onclick="onAddUser()">
            <img src="<?= base_url('assets/addemail.png'); ?>" alt="Add User">
        </div>
    </div>

    <!-- Popup Change Password -->
    <div id="overlayChangePass">
        <form action="/admin/set_password_siswa" method="post">
            <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offChangePassword()">    
            <h1 class="textchangepass">MASUKKAN PASSWORD BARU</h1>
            <div class="inputchangepass">
                <input name="password" type="text" id="password" placeholder="Masukkan password baru...">
                <button type="submit"><img src="<?= base_url('assets/send.png'); ?>" alt="send"></button>
            </div>
        </form>
    </div>

    <!-- Popup Delete User -->
    <div id="overlayDeleteUser">
        <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offDeleteUser()">
        <h1>INGIN MENGHAPUS USER INI?</h1>
        <div class="optionDelete">
            <form id="deleteForm" action="" method="post">
                <button type="submit" class="hapus">HAPUS</button>
                <button type="button" class="tidak" onclick="offDeleteUser()">TIDAK</button>
            </form>
        </div>
    </div>

    <!-- Popup Add User Simple (Hanya untuk tabel users) -->
    <div id="overlayAddUserSimple">
        <form id="formAddUserSimple" action="/admin/add_user_only" method="post">
            <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offAddUserSimple()">
            <h1>TAMBAH AKUN SISWA</h1>
            <div>
                <text>Email</text>
                <input type="email" name="email" id="email_simple" placeholder="Masukkan email..." required>
            </div>
            <div>
                <text>Username</text>
                <input type="text" name="username" id="username_simple" placeholder="Masukkan username..." required>
            </div>
            <div>
                <text>Password</text>
                <input type="text" name="password" id="password_simple" placeholder="Masukkan password..." required>
            </div>
            <input type="hidden" name="role" value="siswa">
            <button type="submit" class="submit-btn">
                <img src="<?= base_url('assets/send.png'); ?>" alt="submit">
            </button>
        </form>
    </div>

<!-- Popup Edit User (For Editing Siswa Data) -->
<div id="overlayAddUser">
    <form id="formAddUser" action="/admin/update_siswa" method="post" enctype="multipart/form-data">
        <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offAddUser()">
        <h1 id="formTitle">EDIT DATA SISWA</h1>
        <input type="hidden" name="id_user" id="id_user">
        <input type="hidden" name="status" id="status" value="diproses">
        <div>
            <text>Nama Lengkap</text>
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan nama lengkap..." required>
        </div>
        <div>
            <text>Nama Panggilan</text>
            <input type="text" name="nama_panggilan" id="nama_panggilan" placeholder="Masukkan nama panggilan...">
        </div>
        <div>
            <text>Nomor Induk</text>
            <input type="text" name="nomor_induk" id="nomor_induk" placeholder="Masukkan nomor induk...">
        </div>
        <div>
            <text>NISN</text>
            <input type="text" name="nisn" id="nisn" placeholder="Masukkan NISN...">
        </div>
        <div>
            <text>Tempat Lahir</text>
            <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan tempat lahir...">
        </div>
        <div>
            <text>Tanggal Lahir</text>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir">
        </div>
        <div>
            <text>Jenis Kelamin</text>
            <select name="jenis_kelamin" id="jenis_kelamin">
                <option value="">Pilih jenis kelamin...</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div>
            <text>Agama</text>
            <select name="agama" id="agama">
                <option value="">Pilih agama...</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
        </div>
        <div>
            <text>Anak Ke-</text>
            <input type="number" name="anak_ke" id="anak_ke" placeholder="Masukkan anak ke...">
        </div>
        <div>
            <text>Status Anak</text>
            <select name="status_anak" id="status_anak">
                <option value="">Pilih status anak...</option>
                <option value="Anak Kandung">Anak Kandung</option>
                <option value="Anak Angkat">Anak Angkat</option>
            </select>
        </div>
        <div>
            <text>Alamat Siswa</text>
            <input type="text" name="alamat_siswa" id="alamat_siswa" placeholder="Masukkan alamat siswa...">
        </div>
        <div>
            <text>Telepon Siswa</text>
            <input type="text" name="telepon_siswa" id="telepon_siswa" placeholder="Masukkan telepon siswa...">
        </div>
        <div>
            <text>Nama SD Asal</text>
            <input type="text" name="nama_tk_asal" id="nama_tk_asal" placeholder="Masukkan nama SD asal...">
        </div>
        <div>
            <text>Alamat SD Asal</text>
            <input type="text" name="alamat_tk_asal" id="alamat_tk_asal" placeholder="Masukkan alamat SD asal...">
        </div>
        <div>
            <text>Gambar</text>
            <input type="file" name="gambar" id="gambar">
        </div>
        <div>
            <text>KK</text>
            <input type="file" name="kk" id="kk">
        </div>
        <div>
            <text>Raport</text>
            <input type="file" name="raport" id="raport">
        </div>
        <div>
            <text>Akta</text>
            <input type="file" name="akta" id="akta">
        </div>
        <div>
            <text>SKL</text>
            <input type="file" name="skl" id="skl">
        </div>
        <div>
            <text>Nomor Induk Asal</text>
            <input type="text" name="nomor_induk_asal" id="nomor_induk_asal" placeholder="Masukkan nomor induk asal...">
        </div>

        <!-- Pilihan Jenis Orang Tua -->
        <h2>Pilih Jenis Orang Tua</h2>
        <div style="margin-bottom: 15px;">
            <label style="color: #fff; margin-right: 20px;">
                <input type="radio" name="parent_type" value="wali" checked onclick="toggleParentForm()"> Orang Tua Wali
            </label>
            <label style="color: #fff;">
                <input type="radio" name="parent_type" value="orang_tua" onclick="toggleParentForm()"> Orang Tua Kandung
            </label>
        </div>

        <!-- Bagian Data Orang Tua Wali -->
        <div id="waliForm">
            <h2>Data Orang Tua Wali</h2>
            <div>
                <text>Nama Ayah Wali</text>
                <input type="text" name="wali[nama_ayah_wali]" id="nama_ayah_wali" placeholder="Masukkan nama ayah wali...">
            </div>
            <div>
                <text>Nama Ibu Wali</text>
                <input type="text" name="wali[nama_ibu_wali]" id="nama_ibu_wali" placeholder="Masukkan nama ibu wali...">
            </div>
            <div>
                <text>Alamat Ayah Wali</text>
                <input type="text" name="wali[alamat_ayah_wali]" id="alamat_ayah_wali" placeholder="Masukkan alamat ayah wali...">
            </div>
            <div>
                <text>Alamat Ibu Wali</text>
                <input type="text" name="wali[alamat_ibu_wali]" id="alamat_ibu_wali" placeholder="Masukkan alamat ibu wali...">
            </div>
            <div>
                <text>Telepon HP</text>
                <input type="text" name="wali[telepon_hp]" id="telepon_hp" placeholder="Masukkan telepon HP...">
            </div>
            <div>
                <text>Pekerjaan Ayah Wali</text>
                <input type="text" name="wali[pekerjaan_ayah_wali]" id="pekerjaan_ayah_wali" placeholder="Masukkan pekerjaan ayah wali...">
            </div>
            <div>
                <text>Pekerjaan Ibu Wali</text>
                <input type="text" name="wali[pekerjaan_ibu_wali]" id="pekerjaan_ibu_wali" placeholder="Masukkan pekerjaan ibu wali...">
            </div>
            <div>
                <text>Pendidikan Ayah Wali</text>
                <select name="wali[pendidikan_ayah_wali]" id="pendidikan_ayah_wali">
                    <option value="">Pilih pendidikan ayah wali...</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div>
                <text>Pendidikan Ibu Wali</text>
                <select name="wali[pendidikan_ibu_wali]" id="pendidikan_ibu_wali">
                    <option value="">Pilih pendidikan ibu wali...</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div>
                <text>Penghasilan Ayah Wali</text>
                <select name="wali[penghasilan_ayah_wali]" id="penghasilan_ayah_wali">
                    <option value="">Pilih penghasilan ayah wali...</option>
                    <option value="0-2.500.000">0 - 2.500.000</option>
                    <option value="2.500.001-5.000.000">2.500.001 - 5.000.000</option>
                    <option value="lebih dari 5.000.000">Lebih dari 5.000.000</option>
                </select>
            </div>
            <div>
                <text>Penghasilan Ibu Wali</text>
                <select name="wali[penghasilan_ibu_wali]" id="penghasilan_ibu_wali">
                    <option value="">Pilih penghasilan ibu wali...</option>
                    <option value="0-2.500.000">0 - 2.500.000</option>
                    <option value="2.500.001-5.000.000">2.500.001 - 5.000.000</option>
                    <option value="lebih dari 5.000.000">Lebih dari 5.000.000</option>
                </select>
            </div>
        </div>

        <!-- Bagian Data Orang Tua Kandung -->
        <div id="orangTuaForm" style="display: none;">
            <h2>Data Orang Tua Kandung</h2>
            <div>
                <text>Nama Ayah</text>
                <input type="text" name="orang_tua[nama_ayah]" id="nama_ayah" placeholder="Masukkan nama ayah...">
            </div>
            <div>
                <text>Nama Ibu</text>
                <input type="text" name="orang_tua[nama_ibu]" id="nama_ibu" placeholder="Masukkan nama ibu...">
            </div>
            <div>
                <text>Alamat Ayah</text>
                <input type="text" name="orang_tua[alamat_ayah]" id="alamat_ayah" placeholder="Masukkan alamat ayah...">
            </div>
            <div>
                <text>Alamat Ibu</text>
                <input type="text" name="orang_tua[alamat_ibu]" id="alamat_ibu" placeholder="Masukkan alamat ibu...">
            </div>
            <div>
                <text>Telepon HP</text>
                <input type="text" name="orang_tua[telepon_hp]" id="orang_tua_telepon_hp" placeholder="Masukkan telepon HP...">
            </div>
            <div>
                <text>Pekerjaan Ayah</text>
                <input type="text" name="orang_tua[pekerjaan_ayah]" id="pekerjaan_ayah" placeholder="Masukkan pekerjaan ayah...">
            </div>
            <div>
                <text>Pekerjaan Ibu</text>
                <input type="text" name="orang_tua[pekerjaan_ibu]" id="pekerjaan_ibu" placeholder="Masukkan pekerjaan ibu...">
            </div>
            <div>
                <text>Pendidikan Ayah</text>
                <select name="orang_tua[pendidikan_ayah]" id="pendidikan_ayah">
                    <option value="">Pilih pendidikan ayah...</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div>
                <text>Pendidikan Ibu</text>
                <select name="orang_tua[pendidikan_ibu]" id="pendidikan_ibu">
                    <option value="">Pilih pendidikan ibu...</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div>
                <text>Penghasilan Ayah</text>
                <select name="orang_tua[penghasilan_ayah]" id="penghasilan_ayah">
                    <option value="">Pilih penghasilan ayah...</option>
                    <option value="0-2.500.000">0 - 2.500.000</option>
                    <option value="2.500.001-5.000.000">2.500.001 - 5.000.000</option>
                    <option value="lebih dari 5.000.000">Lebih dari 5.000.000</option>
                </select>
            </div>
            <div>
                <text>Penghasilan Ibu</text>
                <select name="orang_tua[penghasilan_ibu]" id="penghasilan_ibu">
                    <option value="">Pilih penghasilan ibu...</option>
                    <option value="0-2.500.000">0 - 2.500.000</option>
                    <option value="2.500.001-5.000.000">2.500.001 - 5.000.000</option>
                    <option value="lebih dari 5.000.000">Lebih dari 5.000.000</option>
                </select>
            </div>
        </div>

        <button type="submit" class="submit-btn">
            <img src="<?= base_url('assets/send.png'); ?>" alt="submit">
        </button>
    </form>
</div>

    <!-- Popup Detail Siswa -->
    <div id="overlayDetailSiswa">
        <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offDetailSiswa()">
        <h1>DETAIL SISWA</h1>
        <div class="detail-row">
            <label>ID Siswa</label>
            <span id="detail_id_siswa"></span>
        </div>
        <div class="detail-row">
            <label>Nama Lengkap</label>
            <span id="detail_nama_lengkap"></span>
        </div>
        <div class="detail-row">
            <label>Nama Panggilan</label>
            <span id="detail_nama_panggilan"></span>
        </div>
        <div class="detail-row">
            <label>Nomor Induk</label>
            <span id="detail_nomor_induk"></span>
        </div>
        <div class="detail-row">
            <label>NISN</label>
            <span id="detail_nisn"></span>
        </div>
        <div class="detail-row">
            <label>Tempat Lahir</label>
            <span id="detail_tempat_lahir"></span>
        </div>
        <div class="detail-row">
            <label>Tanggal Lahir</label>
            <span id="detail_tanggal_lahir"></span>
        </div>
        <div class="detail-row">
            <label>Jenis Kelamin</label>
            <span id="detail_jenis_kelamin"></span>
        </div>
        <div class="detail-row">
            <label>Agama</label>
            <span id="detail_agama"></span>
        </div>
        <div class="detail-row">
            <label>Anak Ke-</label>
            <span id="detail_anak_ke"></span>
        </div>
        <div class="detail-row">
            <label>Status Anak</label>
            <span id="detail_status_anak"></span>
        </div>
        <div class="detail-row">
            <label>Alamat Siswa</label>
            <span id="detail_alamat_siswa"></span>
        </div>
        <div class="detail-row">
            <label>Telepon Siswa</label>
            <span id="detail_telepon_siswa"></span>
        </div>
        <div class="detail-row">
            <label>Nama SD Asal</label>
            <span id="detail_nama_tk_asal"></span>
        </div>
        <div class="detail-row">
            <label>Alamat SD Asal</label>
            <span id="detail_alamat_tk_asal"></span>
        </div>
        <div class="detail-row">
            <label>Status</label>
            <span id="detail_status"></span>
        </div>
        <div class="detail-row">
            <label>Gambar</label>
            <div id="detail_gambar"></div>
        </div>
        <div class="detail-row">
            <label>KK</label>
            <div id="detail_kk"></div>
        </div>
        <div class="detail-row">
            <label>Raport</label>
            <div id="detail_raport"></div>
        </div>
        <div class="detail-row">
            <label>Akta</label>
            <div id="detail_akta"></div>
        </div>
        <div class="detail-row">
            <label>SKL</label>
            <div id="detail_skl"></div>
        </div>
        <div class="detail-row">
            <label>ID Login</label>
            <span id="detail_id_login"></span>
        </div>
        <div class="detail-row">
            <label>Nomor Induk Asal</label>
            <span id="detail_nomor_induk_asal"></span>
        </div>
    </div>

    <!-- Sidenav -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="<?= base_url('admin'); ?>">KEPSEK</a>
        <a href="<?= base_url('admin/operator'); ?>">OPERATOR</a>
        <a href="<?= base_url('admin/siswa'); ?>">SISWA</a>
        <a href="<?= base_url('auth/logout'); ?>">LOGOUT</a>
    </div>

    <script>
        // Fungsi untuk membuka dan menutup sidenav
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

// Fungsi untuk Change Password
function onChangePassword(id) {
    document.getElementById('overlayChangePass').style.display = 'block';
    document.querySelector('#overlayChangePass form').action = "/admin/set_password_siswa/" + id;
}

function offChangePassword() {
    document.getElementById('overlayChangePass').style.display = 'none';
}

// Fungsi untuk Delete User
function onDeleteUser(id) {
    document.getElementById('deleteForm').action = "/admin/delete_siswa/" + id;
    document.getElementById('overlayDeleteUser').style.display = 'block';
}

function offDeleteUser() {
    document.getElementById('overlayDeleteUser').style.display = 'none';
}

// Fungsi untuk Tambah Akun Siswa (Hanya Users)
function onAddUser() {
    document.getElementById('formAddUserSimple').reset(); // Reset form
    document.getElementById('overlayAddUserSimple').style.display = 'block';
}

function offAddUserSimple() {
    document.getElementById('overlayAddUserSimple').style.display = 'none';
}

// Fungsi untuk toggle form Orang Tua Wali atau Orang Tua Kandung
function toggleParentForm() {
    const waliForm = document.getElementById('waliForm');
    const orangTuaForm = document.getElementById('orangTuaForm');
    const parentType = document.querySelector('input[name="parent_type"]:checked').value;

    if (parentType === 'wali') {
        waliForm.style.display = 'block';
        orangTuaForm.style.display = 'none';
    } else {
        waliForm.style.display = 'none';
        orangTuaForm.style.display = 'block';
    }
}

// Fungsi untuk Edit Siswa
function onEditSiswa(siswa, id_user, wali, orangTua) {
    console.log("Mengedit siswa dengan id_user:", id_user); // Debugging
    console.log("Data siswa:", siswa); // Debugging
    console.log("Data wali:", wali); // Debugging
    console.log("Data orang tua:", orangTua); // Debugging

    document.getElementById('formTitle').innerText = "EDIT DATA SISWA";
    document.getElementById('formAddUser').action = "/admin/update_siswa";
    document.getElementById('id_user').value = id_user || "";

    // Isi form dengan data siswa (jika ada, jika tidak gunakan string kosong)
    document.getElementById('nama_lengkap').value = siswa ? siswa.nama_lengkap || "" : "";
    document.getElementById('nama_panggilan').value = siswa ? siswa.nama_panggilan || "" : "";
    document.getElementById('nomor_induk').value = siswa ? siswa.nomor_induk || "" : "";
    document.getElementById('nisn').value = siswa ? siswa.nisn || "" : "";
    document.getElementById('tempat_lahir').value = siswa ? siswa.tempat_lahir || "" : "";
    document.getElementById('tanggal_lahir').value = siswa ? siswa.tanggal_lahir || "" : "";
    document.getElementById('jenis_kelamin').value = siswa ? siswa.jenis_kelamin || "" : "";
    document.getElementById('agama').value = siswa ? siswa.agama || "" : "";
    document.getElementById('anak_ke').value = siswa ? siswa.anak_ke || "" : "";
    document.getElementById('status_anak').value = siswa ? siswa.status_anak || "" : "";
    document.getElementById('alamat_siswa').value = siswa ? siswa.alamat_siswa || "" : "";
    document.getElementById('telepon_siswa').value = siswa ? siswa.telepon_siswa || "" : "";
    document.getElementById('nama_tk_asal').value = siswa ? siswa.nama_tk_asal || "" : "";
    document.getElementById('alamat_tk_asal').value = siswa ? siswa.alamat_tk_asal || "" : "";
    document.getElementById('status').value = siswa ? siswa.status || "diproses" : "diproses";
    document.getElementById('nomor_induk_asal').value = siswa ? siswa.nomor_induk_asal || "" : "";

    // Kosongkan input file (karena tidak bisa diisi otomatis)
    document.getElementById('gambar').value = "";
    document.getElementById('kk').value = "";
    document.getElementById('raport').value = "";
    document.getElementById('akta').value = "";
    document.getElementById('skl').value = "";

    // Set radio button berdasarkan data yang ada
    if (wali) {
        document.querySelector('input[name="parent_type"][value="wali"]').checked = true;
        toggleParentForm();

        // Isi form wali
        document.getElementById('nama_ayah_wali').value = wali.nama_ayah_wali || "";
        document.getElementById('nama_ibu_wali').value = wali.nama_ibu_wali || "";
        document.getElementById('alamat_ayah_wali').value = wali.alamat_ayah_wali || "";
        document.getElementById('alamat_ibu_wali').value = wali.alamat_ibu_wali || "";
        document.getElementById('telepon_hp').value = wali.telepon_hp || "";
        document.getElementById('pekerjaan_ayah_wali').value = wali.pekerjaan_ayah_wali || "";
        document.getElementById('pekerjaan_ibu_wali').value = wali.pekerjaan_ibu_wali || "";
        document.getElementById('pendidikan_ayah_wali').value = wali.pendidikan_ayah_wali || "";
        document.getElementById('pendidikan_ibu_wali').value = wali.pendidikan_ibu_wali || "";
        document.getElementById('penghasilan_ayah_wali').value = wali.penghasilan_ayah_wali || "";
        document.getElementById('penghasilan_ibu_wali').value = wali.penghasilan_ibu_wali || "";
    } else if (orangTua) {
        document.querySelector('input[name="parent_type"][value="orang_tua"]').checked = true;
        toggleParentForm();

        // Isi form orang tua kandung
        document.getElementById('nama_ayah').value = orangTua.nama_ayah || "";
        document.getElementById('nama_ibu').value = orangTua.nama_ibu || "";
        document.getElementById('alamat_ayah').value = orangTua.alamat_ayah || "";
        document.getElementById('alamat_ibu').value = orangTua.alamat_ibu || "";
        document.getElementById('orang_tua_telepon_hp').value = orangTua.telepon_hp || "";
        document.getElementById('pekerjaan_ayah').value = orangTua.pekerjaan_ayah || "";
        document.getElementById('pekerjaan_ibu').value = orangTua.pekerjaan_ibu || "";
        document.getElementById('pendidikan_ayah').value = orangTua.pendidikan_ayah || "";
        document.getElementById('pendidikan_ibu').value = orangTua.pendidikan_ibu || "";
        document.getElementById('penghasilan_ayah').value = orangTua.penghasilan_ayah || "";
        document.getElementById('penghasilan_ibu').value = orangTua.penghasilan_ibu || "";
    } else {
        // Default ke wali jika tidak ada data
        document.querySelector('input[name="parent_type"][value="wali"]').checked = true;
        toggleParentForm();
    }

    document.getElementById('overlayAddUser').style.display = 'block';
}

function offAddUser() {
    document.getElementById('overlayAddUser').style.display = 'none';
}

// Fungsi untuk Detail Siswa
function onDetailSiswa(siswa) {
    console.log("Menampilkan detail siswa:", siswa); // Debugging

    document.getElementById('detail_id_siswa').innerText = siswa ? siswa.id_siswa || "-" : "-";
    document.getElementById('detail_nama_lengkap').innerText = siswa ? siswa.nama_lengkap || "-" : "-";
    document.getElementById('detail_nama_panggilan').innerText = siswa ? siswa.nama_panggilan || "-" : "-";
    document.getElementById('detail_nomor_induk').innerText = siswa ? siswa.nomor_induk || "-" : "-";
    document.getElementById('detail_nisn').innerText = siswa ? siswa.nisn || "-" : "-";
    document.getElementById('detail_tempat_lahir').innerText = siswa ? siswa.tempat_lahir || "-" : "-";
    document.getElementById('detail_tanggal_lahir').innerText = siswa ? siswa.tanggal_lahir || "-" : "-";
    document.getElementById('detail_jenis_kelamin').innerText = siswa ? siswa.jenis_kelamin || "-" : "-";
    document.getElementById('detail_agama').innerText = siswa ? siswa.agama || "-" : "-";
    document.getElementById('detail_anak_ke').innerText = siswa ? siswa.anak_ke || "-" : "-";
    document.getElementById('detail_status_anak').innerText = siswa ? siswa.status_anak || "-" : "-";
    document.getElementById('detail_alamat_siswa').innerText = siswa ? siswa.alamat_siswa || "-" : "-";
    document.getElementById('detail_telepon_siswa').innerText = siswa ? siswa.telepon_siswa || "-" : "-";
    document.getElementById('detail_nama_tk_asal').innerText = siswa ? siswa.nama_tk_asal || "-" : "-";
    document.getElementById('detail_alamat_tk_asal').innerText = siswa ? siswa.alamat_tk_asal || "-" : "-";
    document.getElementById('detail_status').innerText = siswa ? siswa.status || "-" : "-";
    document.getElementById('detail_nomor_induk_asal').innerText = siswa ? siswa.nomor_induk_asal || "-" : "-";

    // Tampilkan gambar jika ada
    document.getElementById('detail_gambar').innerHTML = siswa && siswa.gambar ? `<img src="<?= base_url(); ?>/${siswa.gambar}" alt="Gambar Siswa">` : "-";
    document.getElementById('detail_kk').innerHTML = siswa && siswa.kk ? `<img src="<?= base_url(); ?>/${siswa.kk}" alt="KK">` : "-";
    document.getElementById('detail_raport').innerHTML = siswa && siswa.raport ? `<img src="<?= base_url(); ?>/${siswa.raport}" alt="Raport">` : "-";
    document.getElementById('detail_akta').innerHTML = siswa && siswa.akta ? `<img src="<?= base_url(); ?>/${siswa.akta}" alt="Akta">` : "-";
    document.getElementById('detail_skl').innerHTML = siswa && siswa.skl ? `<img src="<?= base_url(); ?>/${siswa.skl}" alt="SKL">` : "-";

    document.getElementById('overlayDetailSiswa').style.display = 'block';
}

function offDetailSiswa() {
    document.getElementById('overlayDetailSiswa').style.display = 'none';
}
    </script>
</body>
</html>