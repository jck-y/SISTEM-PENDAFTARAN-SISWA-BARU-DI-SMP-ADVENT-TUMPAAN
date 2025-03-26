<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepsek Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #1d4ed8;
            padding: 20px;
        }
        .search-bar {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 8px 12px;
            width: 100%;
        }
        .search-container {
            position: relative;
            width: 100%;
            max-width: 600px;
        }
        .search-container i {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #1d4ed8;
            cursor: pointer;
        }
        .status-btn {
            border-radius: 20px;
            font-weight: bold;
            padding: 5px 15px;
            border: none;
        }
        .btn-accept {
            background-color: #22c55e;
            color: white;
        }
        .btn-reject {
            background-color: #ef4444;
            color: white;
        }
        .menu-icon {
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="header">KEPSEK</div>
            <div class="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        
        <div class="search-container mt-3">
            <input type="text" class="search-bar" placeholder="Search">
            <i class="fas fa-search"></i>
        </div>
        
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>JACKY KARONGKONG</td>
                    <td>
                        <button class="status-btn btn-accept">TERIMA <i class="fas fa-chevron-down"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>RICHARD JONG</td>
                    <td>
                        <button class="status-btn btn-reject">TOLAK <i class="fas fa-chevron-down"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
