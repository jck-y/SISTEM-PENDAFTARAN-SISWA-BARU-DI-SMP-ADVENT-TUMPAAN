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
                <tr>
                    <td>JACKY KARONGKONG</td>
                    <td>
                        <select class="status-dropdown green" onchange="changeStatus(this)">
                            <option value="TERIMA" selected>TERIMA</option>
                            <option value="TOLAK">TOLAK</option>
                        </select>
                    </td>
                </tr>
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
            if (select.value === "TERIMA") {
                select.className = "status-dropdown green";
            } else {
                select.className = "status-dropdown red";
            }
        }
    </script>
</body>
</html>
