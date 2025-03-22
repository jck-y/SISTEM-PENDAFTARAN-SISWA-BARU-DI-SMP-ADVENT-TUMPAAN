<!-- app/Views/orangtua_kandung.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru - Orang Tua Kandung</title>
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
            font-size: 1.2rem; /* Matches Figma */
            font-weight: bold;
            text-transform: uppercase;
        }

        .form-header h3 {
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 5px;
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

        .sub-label {
            color: white;
            font-size: 0.85rem;
            font-weight: bold;
            margin-left: 10px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-group button {
            padding: 12px;
            width: 100%;
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

        /* Highlighted field (Penghasilan Ibu) */
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

            .form-header h3 {
                font-size: 1.2rem;
            }

            .form-group label,
            .sub-label {
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
            <h3>ORANG TUA KANDUNG</h3>
        </div>
        <form action="<?= base_url('siswa/save_orangtua_kandung'); ?>" method="post">
            <div class="form-group">
                <label for="nama_lengkap_ayah">Nama Lengkap Ayah</label>
                <input type="text" id="nama_lengkap_ayah" name="nama_lengkap_ayah">
            </div>
            <div class="form-group">
                <label for="nama_lengkap_ibu">Nama Lengkap Ibu</label>
                <input type="text" id="nama_lengkap_ibu" name="nama_lengkap_ibu">
            </div>
            <div class="form-group">
                <label for="alamat_ayah">Alamat Ayah</label>
                <input type="text" id="alamat_ayah" name="alamat_ayah">
            </div>
            <div class="form-group">
                <label for="alamat_ibu">Alamat Ibu</label>
                <input type="text" id="alamat_ibu" name="alamat_ibu">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon/No HP</label>
                <input type="tel" id="telepon" name="telepon">
            </div>
            <div class="form-group">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah">
            </div>
            <div class="form-group">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu">
            </div>
            <div class="form-group">
                <label>Pendidikan Terakhir Orang Tua</label>
                <div class="sub-label">Ayah</div>
                <select id="pendidikan_ayah" name="pendidikan_ayah">
                    <option value="">Pilih Pendidikan</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="form-group">
                <div class="sub-label">Ibu</div>
                <select id="pendidikan_ibu" name="pendidikan_ibu">
                    <option value="">Pilih Pendidikan</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="penghasilan_ayah">Penghasilan Ayah</label>
                <input type="text" id="penghasilan_ayah" name="penghasilan_ayah">
            </div>
            <div class="form-group">
                <label for="penghasilan_ibu">Penghasilan Ibu</label>
                <input type="text" id="penghasilan_ibu" name="penghasilan_ibu" class="highlighted-field">
            </div>
            <div class="button-group">
                <button type="submit">Berikutnya</button>
            </div>
        </form>
    </div>
</body>
</html>