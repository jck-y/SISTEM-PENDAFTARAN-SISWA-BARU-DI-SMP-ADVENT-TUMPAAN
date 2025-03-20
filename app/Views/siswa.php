<!-- app/Views/siswa.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 10px;
        }

        .form-wrapper {
            background-color: #004080; /* Blue background from Figma */
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 390px; /* Matches iPhone 13 width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-header {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .form-header h2 {
            font-size: 1.2rem; /* Adjusted to match Figma */
            font-weight: bold;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: white;
            font-size: 0.85rem; /* Matches Figma label size */
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px; /* Matches Figma input height */
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            background-color: #fff;
            color: #333;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        .form-group select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="black" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 10px center;
            background-color: #fff;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }

        .button-group button {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            color: #004080;
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-group button:hover {
            background-color: #e0e0e0;
        }

        /* Highlighted fields (ANAK KE) */
        .highlighted-field {
            background-color: #e0f0ff; /* Light blue highlight as per Figma */
        }

        /* Responsive Design for Desktop */
        @media (min-width: 768px) {
            .form-wrapper {
                max-width: 600px; /* Wider form for desktop */
                padding: 30px;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }

            .form-group label {
                font-size: 1rem;
            }

            .form-group input,
            .form-group select {
                font-size: 1rem;
                padding: 14px;
            }

            .button-group button {
                font-size: 1rem;
                padding: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <div class="form-header">
            <h2>FORMULIR PENDAFTARAN SISWA BARU</h2>
        </div>
        <form>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap">
            </div>
            <div class="form-group">
                <label for="nama_panggilan">Nama Panggilan</label>
                <input type="text" id="nama_panggilan" name="nama_panggilan">
            </div>
            <div class="form-group">
                <label for="nomor_induk_asal">Nomor Induk Asal</label>
                <input type="text" id="nomor_induk_asal" name="nomor_induk_asal">
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn">
            </div>
            <div class="form-group">
                <label for="tempat_tanggal_lahir">Tempat Tanggal Lahir</label>
                <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select id="agama" name="agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="anak_ke">Anak ke</label>
                <input type="number" id="anak_ke" name="anak_ke" class="highlighted-field">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" name="status">
            </div>
            <div class="form-group">
                <label for="alamat_siswa">Alamat Siswa :</label>
                <input type="text" id="alamat_siswa" name="alamat_siswa">
            </div>
            <div class="form-group">
                <label for="nama_sekolah">Nama Sekolah</label>
                <input type="text" id="nama_sekolah" name="nama_sekolah">
            </div>
            <div class="form-group">
                <label for="nama_tk_asal">Nama TK Asal:</label>
                <input type="text" id="nama_tk_asal" name="nama_tk_asal">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon/HP</label>
                <input type="tel" id="telepon" name="telepon">
            </div>
            <div class="form-group">
                <label for="alamat_sekolah">Alamat Sekolah</label>
                <input type="text" id="alamat_sekolah" name="alamat_sekolah">
            </div>
            <div class="button-group">
                <button type="button" onclick="window.location.href='<?= base_url('orangtua') ?>'">Orang Tua Kandung</button>
                <button type="button" onclick="window.location.href='<?= base_url('orangtuawali') ?>'">Orang Tua Wali</button>
            </div>
        </form>
    </div>
</body>
</html>