<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Operator</title>
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
            font-size: 16px;
            font-weight: 600;
            padding: 15px 20px;
            /* background: linear-gradient(135deg, #ffffff, #e8ecef); */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin-right: 16px;
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
            background-color: #fff;
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
        .action-cell-delete {
            padding-left: 20px;
        }

        .action-cell-changepass img,
        .action-cell-delete img {
            height: 24px;
            width: 24px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .action-cell-changepass img:hover,
        .action-cell-delete img:hover {
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
            right: 5px;
            background: none;
            border: none;
            cursor: pointer;
            margin-left: -34px;
        }

        .inputchangepass img {
            width: 24px;
        }

        #overlayChangePass img[alt="close"],
        #overlayDeleteEmail img[alt="close"],
        #overlayAddEmail img[alt="close"] {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 30px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        #overlayChangePass img[alt="close"]:hover,
        #overlayDeleteEmail img[alt="close"]:hover,
        #overlayAddEmail img[alt="close"]:hover {
            transform: rotate(90deg);
        }

        /* Popup Delete Email */
        #overlayDeleteEmail {
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

        #overlayDeleteEmail h1 {
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

        /* Popup Add Email */
        #overlayAddEmail {
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

        #overlayAddEmail h1 {
            font-size: 20px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 25px;
        }

        #overlayAddEmail text {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #fff;
            text-align: left;
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        #overlayAddEmail input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        #overlayAddEmail input:focus {
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2), 0 0 0 3px rgba(26, 73, 212, 0.2);
        }

        #overlayAddEmail .submit-btn {
            position: absolute;
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
        }

        #overlayAddEmail .submit-btn:hover {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            transform: scale(1.1);
        }

        #overlayAddEmail .submit-btn img {
            width: 24px;
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
            #overlayDeleteEmail,
            #overlayAddEmail {
                width: 95%;
                padding: 20px;
            }

            .textchangepass,
            #overlayDeleteEmail h1,
            #overlayAddEmail h1 {
                font-size: 18px;
            }

            .inputchangepass input {
                font-size: 14px;
                padding: 10px 35px 10px 12px;
            }

            #overlayAddEmail input {
                font-size: 14px;
                padding: 10px;
            }

            #overlayAddEmail .submit-btn {
                width: 45px;
                height: 45px;
                bottom: 15px;
                right: 15px;
            }

            #overlayAddEmail .submit-btn img {
                width: 20px;
            }

            .optionDelete .hapus,
            .optionDelete .tidak {
                font-size: 14px;
                padding: 8px 20px;
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
            .action-cell-delete img {
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
            <h1>ADMIN || DAFTAR OPERATOR</h1>
            <img class="menu" src="<?= base_url('assets/menu.png'); ?>" onclick="openNav()"/>
        </header>

        <!-- Search Bar -->
        <div class="search-container">
            <form action="<?= base_url('admin/operator'); ?>" method="get" style="width: 100%; display: flex; align-items: center;">
                <input type="text" name="keyword" placeholder="Cari berdasarkan nama..." value="<?= esc($keyword ?? ''); ?>">
                <button type="submit"><img src="<?= base_url('assets/search.png'); ?>" alt="search"></button>
            </form>
        </div>

        <!-- Table -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>CHANGE PASSWORD</th>
                        <th>DELETE USERNAME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($operator)): ?>
                        <tr><td colspan="3"><?= $keyword ? "Tidak ada operator dengan nama '$keyword'" : "Tidak ada data operator"; ?></td></tr>
                    <?php else: ?>
                        <?php foreach ($operator as $o): ?>
                            <tr>
                                <td><?= esc($o['username']) ?></td>
                                <td class="action-cell-changepass">
                                    <img class="changepass" src="<?= base_url('assets/changepass.png'); ?>" alt="Change Password" onclick="onChangePassword(<?= $o['id'] ?>)">
                                </td>
                                <td class="action-cell-delete">
                                    <img class="deletemail" src="<?= base_url('assets/deletemail.png'); ?>" alt="Delete Email" onclick="onDeleteEmail(<?= $o['id'] ?>)">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Floating Add Button -->
        <div class="floating-button" onclick="onAddEmail()">
            <img src="<?= base_url('assets/addemail.png'); ?>" alt="Add Email">
        </div>
    </div>

    <div id="overlayChangePass">
        <form id="changePassForm" action="/admin/set_password_operator" method="post">
            <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offChangePassword()">    
            <h1 class="textchangepass">MASUKKAN PASSWORD BARU</h1>
            <div class="inputchangepass">
                <input name="password" type="text" id="password" placeholder="Masukkan password baru...">
                <button type="submit"><img src="<?= base_url('assets/send.png'); ?>" alt="send"></button>
            </div>
        </form>
    </div>

    <div id="overlayDeleteEmail">
        <h1>INGIN MENGHAPUS EMAIL INI?</h1>
        <div class="optionDelete">
            <form id="deleteForm" action="" method="post">
                <button type="submit" class="hapus">HAPUS</button>
                <button type="button" class="tidak" onclick="offDeleteEmail()">TIDAK</button>
            </form>
        </div>
    </div>

    <div id="overlayAddEmail">
        <form action="/admin/add_operator" method="post">
            <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offAddEmail()">
            <h1>MASUKKAN AKUN BARU</h1>
            <div>
                <text>NAME</text>
                <input type="text" name="username" class="addemail" placeholder="Masukkan email..." required>
            </div>
            <div>
                <text>PASSWORD</text>
                <input type="text" name="password" class="addpassword" placeholder="Masukkan password..." required>
            </div>
            <button type="submit" class="submit-btn">
                <img src="<?= base_url('assets/send.png'); ?>" alt="submit">
            </button>
        </form>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="<?= base_url('admin'); ?>">KEPSEK</a>
        <a href="<?= base_url('admin/operator'); ?>">OPERATOR</a>
        <a href="<?= base_url('admin/siswa'); ?>">SISWA</a>
        <a href="<?= base_url('auth/logout'); ?>">LOGOUT</a>
    </div>

    <script>
        function onChangePassword(id) {
            document.getElementById('changePassForm').action = "/admin/set_password_operator/" + id;
            document.getElementById('overlayChangePass').style.display = 'block';
        }

        function offChangePassword() {
            document.getElementById('overlayChangePass').style.display = 'none';
        }

        function onDeleteEmail(id) {
            document.getElementById('deleteForm').action = "/admin/delete_operator/" + id;
            document.getElementById('overlayDeleteEmail').style.display = 'block';
        }

        function offDeleteEmail() {
            document.getElementById('overlayDeleteEmail').style.display = 'none';
        }

        function onAddEmail() {
            document.getElementById('overlayAddEmail').style.display = 'block';
        }

        function offAddEmail() {
            document.getElementById('overlayAddEmail').style.display = 'none';
        }

        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

</body>
</html>