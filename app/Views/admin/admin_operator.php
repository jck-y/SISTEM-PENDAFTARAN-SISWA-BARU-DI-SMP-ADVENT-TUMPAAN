<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Operator</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Import Google Font */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            margin: auto;
            padding: 20px;
        }

        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #1a49d4;
            font-size: 24px;
            font-weight: bold;
        }
        
        .menu {
            cursor: pointer;
            height: 60px;
            width: 60px;
        }

        .deletemail {
            cursor: pointer;
        }

        .changepass {
            cursor: pointer;
        }

        .menu-icon {
            font-size: 24px;
            cursor: pointer;
        }


        /* Search Bar */
        .search-container {
            display: flex;
            align-items: center;
            margin: 20px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .search-container input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
        }

        .search-container input:focus {
            outline: none;
        }

        .icsearch {
            cursor: pointer;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            color: #1a49d4;
            font-weight: bold;
        }

        .action-cell-changepass {
            padding-left: 60px;
        }

        .action-cell-delete { 
            padding-left: 60px;
        }


        /* Floating Add Button */
        .floating-button {
            position: fixed;
            bottom: 80px;
            right: 80px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .floating-button i {
            color: white;
            font-size: 24px;
        }

        /* Popup Change Password */
        #overlayChangePass {
            position: fixed;
            display: none;
            width: 50%;
            padding: 30px;
            background-color: rgba(108, 141, 239, 1); /* Warna biru solid */
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 3px solid rgba(0, 0, 0, 0.2); /* Tambahan border */
        }

        /* Style untuk teks dalam overlay */
        .textchangepass {
            font-size: 22px;
            font-weight: bold;
            color: #000;
            margin-bottom: 15px;
        }

        /* Style untuk input */
        .inputchangepass {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .inputchangepass input {
            width: 85%;
            padding: 12px;
            border: none;
            outline: none;
            border-radius: 8px;
            font-size: 16px;
            box-shadow: inset 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        /* Style untuk ikon kirim */
        .inputchangepass img {
            position: absolute;
            right: 10px;
            width: 30px;
            cursor: pointer;
        }

        /* Style untuk tombol close */
        #overlayChangePass img[alt="close"] {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            cursor: pointer;
        }

        /* Popup Delete Email */
        #overlayDeleteEmail {
            position: fixed;
            display: none;
            width: 30%;
            padding: 30px;
            background-color: rgba(108, 141, 239, 1); /* Warna biru solid */
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 3px solid rgba(0, 0, 0, 0.2); /* Border untuk memperjelas */
        }

        /* Style untuk teks dalam overlay */
        #overlayDeleteEmail h1 {
            font-size: 22px;
            font-weight: bold;
            color: #000;
            margin-bottom: 15px;
        }

        /* Style untuk tombol pilihan */
        .optionDelete {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        /* Style tombol hapus */
        .optionDelete .hapus {
            background-color: red;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .optionDelete .hapus:hover {
            background-color: darkred;
        }

        /* Style tombol tidak */
        .optionDelete .tidak {
            background-color: #ddd;
            color: black;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .optionDelete .tidak:hover {
            background-color: #bbb;
        }

        #overlayAddEmail {
            position: fixed;
            display: none;
            width: 40%;
            padding: 30px;
            padding-bottom: 60px;
            background-color: rgba(108, 141, 239, 1); /* Warna biru solid */
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            border: 3px solid rgba(0, 0, 0, 0.2); /* Border transparan */
        }

        /* Style untuk ikon close */
        #overlayAddEmail img {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            cursor: pointer;
        }

        /* Style untuk teks judul */
        #overlayAddEmail h1 {
            font-size: 22px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
        }

        /* Style untuk label */
        #overlayAddEmail text {
            display: block;
            font-size: 16px;
            font-weight: bold;
            color: black;
            text-align: left;
            margin-bottom: 5px;
        }

        /* Style untuk input */
        #overlayAddEmail input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #000;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        /* Style untuk dropdown */
        #overlayAddEmail select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #000;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #fff;
        }

        /* Style untuk tombol submit */
        #overlayAddEmail .submit-btn {
            width: 50px;
            height: 50px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            position: absolute;
            bottom: 20px;
            right: 20px;
            top: 310px;
        }

        #overlayAddEmail .submit-btn img {
            width: 100%;
        }

        /* Style untuk sidenav */
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

        /* Responsive */
        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
            }

            .search-container input {
                font-size: 14px;
            }

            .floating-button {
                width: 50px;
                height: 50px;
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
            <input type="text" placeholder="Search...">
            <img class="icsearch" src="<?= base_url('assets/search.png'); ?>" alt="search">
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>CHANGE PASSWORD</th>
                    <th>DELETE USERNAME</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($operator as $o): ?>
                <tr>
                    <td><?= $o['nama'] ?></td>
                    <td class="action-cell-changepass"><img class="changepass" src="<?= base_url('assets/changepass.png'); ?>" alt="Change Password" onclick="onChangePassword()"></td>
                    <td class="action-cell-delete"><img class="deletemail" src="<?= base_url('assets/deletemail.png'); ?>" alt="Delete Email" onclick="onDeleteEmail(<?= $o['id'] ?>)"></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Floating Add Button -->
        <div class="floating-button">
            <img src="<?= base_url('assets/addemail.png'); ?>" alt="Add Email" onclick="onAddEmail()">
        </div>
    </div>

    <div id="overlayChangePass">
    <form action="/admin/set_password_operator/<?= $o['id'] ?>" method="post">
        <img src="<?= base_url('assets/close.png'); ?>" alt="close" onClick="offChangePassword()">    
        <h1 class="textchangepass">MASUKAN PASSWORD YANG BARU!</h1>
        <div class = "inputchangepass">
            <input name="password" type="text" id="password" value="<?= $o['password'] ?>" placeholder="Masukkan password baru...">
            <button type="submit"><img src="<?= base_url('assets/send.png'); ?>" alt="send"></button>
        </div>
        </form>
    </div>

    <div id="overlayDeleteEmail">
        <h1 class="">INGIN MENGHAPUS EMAIL INI?</h1>
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
        <h1>MASUKKAN AKUN BARU!</h1>
        <div>
            <text>NAME</text>
            <input type="text" name="nama" class="addemail" placeholder="Masukkan email..." required>
        </div>
        <div>
            <text>PASSWORD</text>
            <input type="text" name="password" sclass="addpassword" placeholder="Masukkan password..." required>
        </div>
        <button type="submit" class="submit-btn">
            <img src="<?= base_url('assets/send.png'); ?>" alt="submit">
        </button>
        </form>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href = "<?= base_url('admin/kepsek'); ?>">KEPSEK</a>
        <a href = "<?= base_url('admin/operator'); ?>">OPERATOR</a>
        <a href = "<?= base_url('admin/siswa'); ?>">SISWA</a>
        <a href="<?= base_url('auth/logout'); ?>">LOGOUT</a>
    </div>

    <script>
        function onChangePassword() {
            document.getElementById('overlayChangePass').style.display = 'block';
            };
        function offChangePassword() {
            document.getElementById('overlayChangePass').style.display = 'none';
        }
        function onDeleteEmail(id) {
            // Atur action form dengan ID kepsek yang dipilih
            document.getElementById('deleteForm').action = "/admin/delete_operator/" + id;
            document.getElementById('overlayDeleteEmail').style.display = 'block';
            };
        function offDeleteEmail() {
            document.getElementById('overlayDeleteEmail').style.display = 'none';
        }
        function onAddEmail() {
            document.getElementById('overlayAddEmail').style.display = 'block';
            };
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
