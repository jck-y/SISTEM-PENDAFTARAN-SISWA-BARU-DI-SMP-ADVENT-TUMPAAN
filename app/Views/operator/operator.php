<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        .status-dropdown {
            width: 120px;
            font-weight: bold;
            border: none;
            color: white;
            text-align: center;
            border-radius: 5px;
            padding: 8px;
        }
        .status-dropdown.green {
            background-color: #28a745;
        }
        .status-dropdown.red {
            background-color: #dc3545;
        }
        .status-dropdown.yellow {
        background-color: #ffc107;
    }


    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>OPERATOR</h1>
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
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mapping data GET Email -->
                <?php if(!empty($siswa)): ?>
                    <?php $no = 1; foreach($siswa as $s): ?>
                <tr>
                <td><a href="/operator/detail_siswa/<?= $s['id_siswa'] ?>"><?= esc($s['nama_lengkap']) ?></a></td>
                    <td>
                    <form action="/operator/update_status" method="post">
                        <input type="hidden" name="id_siswa" value="<?= $s['id_siswa'] ?>">
                        <select name="status" class="status-dropdown <?= ($s['status'] == 'Diterima') ? 'green' : ($s['status'] == 'Ditolak' ? 'red' : 'yellow') ?>" 
                            onchange="changeStatus(this); this.form.submit();">
                        <option value="Diproses" <?= $s['status'] == 'Diproses' ? 'selected' : '' ?>>DIPROSES</option>
                        <option value="Diterima" <?= $s['status'] == 'Diterima' ? 'selected' : '' ?>>DITERIMA</option>
                        <option value="Ditolak" <?= $s['status'] == 'Ditolak' ? 'selected' : '' ?>>DITOLAK</option>
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

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="<?= base_url('auth/logout'); ?>">LOGOUT</a>
    </div>

    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
        function changeStatus(select) {
            // Hapus semua class status-dropdown sebelum menambahkan yang baru
            select.classList.remove("green", "red", "yellow");

            if (select.value === "Diterima") {
                select.classList.add("green");
            } else if (select.value === "Ditolak") {
            select.classList.add("red");
            } else if (select.value === "Diproses") {
                select.classList.add("yellow");
            }
        }
    </script>
</body>
</html>
