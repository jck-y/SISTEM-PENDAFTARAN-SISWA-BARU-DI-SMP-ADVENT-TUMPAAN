<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        /* Sidebar
        .sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 250px;
            height: 100%;
            background: white;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar.active {
            right: 0;
        }

        .sidebar .close-btn {
            align-self: flex-end;
            font-size: 24px;
            cursor: pointer;
        }

        .sidebar .menu-item {
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            background-color: #1a49d4;
            color: white;
        }

        .sidebar .menu-item:hover {
            background-color: #0f2c96;
        } */

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
            padding-left: 4%;
        }

        .action-cell-delete {
            padding-left: 2%;
        }


        /* Floating Add Button */
        .floating-button {
            position: fixed;
            bottom: 80px;
            right: 80px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .floating-button i {
            color: white;
            font-size: 24px;
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
            <h1>ADMIN</h1>
            <img class="menu" src="<?= base_url('assets/menu.png'); ?>"/>
        </header>

        <!-- Sidebar
        <div class="sidebar" id="sidebar">
            <img src="<?= base_url('assets/menu.png'); ?>" onclick="toggleSidebar()"/>
            <div class="menu-item">KEPALA SEKOLAH & OPERATOR</div>
            <div class="menu-item">SISWA</div>
        </div> -->

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
                    <th>EMAIL</th>
                    <th>CHANGE PASSWORD</th>
                    <th>DELETE EMAIL</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mapping data GET Email -->
                <tr>
                    <td>KEPALA SEKOLAH</td>
                    <td>KEPALA SEKOLAH 1@GMAIL.COM</td>
                    <td class="action-cell-changepass"><img class="changepass" src="<?= base_url('assets/changepass.png'); ?>" alt="Change Password"></td>
                    <td class="action-cell-delete"><img class="deletemail" src="<?= base_url('assets/deletemail.png'); ?>" alt="Delete Email"></td>
                </tr>
            </tbody>
        </table>

        <!-- Floating Add Button -->
        <div class="floating-button">
            <img src="<?= base_url('assets/addemail.png'); ?>" alt="Add Email">
        </div>
    </div>

    <script>
        // function toggleSidebar() {
        //     let sidebar = document.getElementById("sidebar");
        //     if (sidebar.classList.contains("active")) {
        //         sidebar.classList.remove("active");
        //     } else {
        //         sidebar.classList.add("active");
        //     }
        // }
    </script>

</body>
</html>
