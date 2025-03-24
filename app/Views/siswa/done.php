<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Selesai</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('https://static.vecteezy.com/system/resources/previews/015/227/308/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #2148C0;
            padding: 40px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: white;
        }

        .container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .container p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .btn-home {
            display: inline-block;
            padding: 12px 24px;
            background-color: #fff;
            color: #2148C0;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-home:hover {
            background-color: #FFC107;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Terima Kasih!</h1>
        <p>Terima kasih telah mendaftar. Pendaftaran Anda telah berhasil disubmit. Silahkan menunggu informasi selanjutnya dari kami.</p>
        <a href="<?= base_url('/'); ?>" class="btn-home">Kembali ke Beranda</a>
    </div>
</body>
</html>