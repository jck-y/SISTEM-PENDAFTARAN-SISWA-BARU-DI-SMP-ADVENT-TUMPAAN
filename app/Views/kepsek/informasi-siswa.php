<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h1 {
            color: #1a49d4;
            font-size: 28px;
            font-weight: bold;
        }
        .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .column {
            width: 45%;
        }
        .info {
            margin-bottom: 10px;
        }
        .info span {
            font-weight: bold;
        }
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            .column {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>KEPSEK</h1>
    <div class="container">
        <div class="column">
            <p class="info"><span>Nama Lengkap:</span> JOHAN PRATAMA</p>
            <p class="info"><span>Nama Panggilan:</span> JOHAN</p>
            <p class="info"><span>Nomor Induk Asal:</span> 12345</p>
            <p class="info"><span>NISN:</span> 98765</p>
            <p class="info"><span>Tempat, Tanggal Lahir:</span> JAKARTA, 15 MEI 2010</p>
            <p class="info"><span>Jenis Kelamin:</span> LAKI-LAKI</p>
            <p class="info"><span>Agama:</span> KRISTEN</p>
            <p class="info"><span>Anak Ke:</span> 2</p>
            <p class="info"><span>Status Anak dalam Keluarga:</span></p>
            <p class="info"><span>Alamat:</span> JL.MERDEKA NO.10 MANADO</p>
            <p class="info"><span>Telepon/HP:</span> 08787987878</p>
            <p class="info"><span>Nama Asal TK:</span> TK HARAPAN BANGSA</p>
            <p class="info"><span>Alamat TK Asal:</span> JL.PENDIDIKAN NO.5 MANADO</p>
        </div>
        <div class="column">
            <p class="info"><span>Ayah Kandung/Wali:</span> BUDI SANTOSO</p>
            <p class="info"><span>Ibu Kandung/Wali:</span> RINA SARI</p>
            <p class="info"><span>Alamat Ayah:</span> JL.MERDEKA NO.10 MANADO</p>
            <p class="info"><span>Alamat Ibu:</span> JL.MERDEKA NO.10 MANADO</p>
            <p class="info"><span>Telepon/HP:</span> 0812344676</p>
            <p class="info"><span>Pekerjaan Ayah:</span> PEGAWAI NEGERI</p>
            <p class="info"><span>Pekerjaan Ibu:</span> IBU RUMAH TANGGA</p>
            <p class="info"><span>Pendidikan Terakhir Ayah:</span> S1</p>
            <p class="info"><span>Pendidikan Terakhir Ibu:</span> SMA</p>
            <p class="info"><span>Penghasilan Perbulan Ayah:</span> RP.7.000.000</p>
            <p class="info"><span>Penghasilan Perbulan Ibu:</span> RP.2.000.000</p>
        </div>
    </div>
</body>
</html>