<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: auto;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .siswa-row {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .status-label {
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 5px;
            color: white;
            text-align: center;
            min-width: 100px;
        }

        .status-diterima {
            background-color: #28a745; 
        }

        .status-diproses {
            background-color: #ffc107; 
            color: black;
        }

        .status-ditolak {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($siswa as $s): ?>
        <div class="siswa-row">
            <h1><?= $s['nama'] ?></h1>
            <span class="status-label 
                <?= ($s['status'] == 'Diterima') ? 'status-diterima' : 
                    ($s['status'] == 'Ditolak' ? 'status-ditolak' : 'status-diproses') ?>">
                <?= strtoupper($s['status']) ?>
            </span>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>