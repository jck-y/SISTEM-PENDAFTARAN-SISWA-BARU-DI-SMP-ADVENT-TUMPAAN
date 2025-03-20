<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Orang Tua Kandung</title>
    <style>
        /* Copy the same style from siswa.php */
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
            background-color: #004080;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 390px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* ... rest of your existing styles ... */
    </style>
</head>
<body>
    <div class="form-wrapper">
        <div class="form-header">
            <h2>DATA ORANG TUA KANDUNG</h2>
        </div>
        <form>
            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" id="nama_ayah" name="nama_ayah">
            </div>
            <div class="form-group">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah">
            </div>
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" id="nama_ibu" name="nama_ibu">
            </div>
            <div class="form-group">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu">
            </div>
            <div class="form-group">
                <label for="alamat_ortu">Alamat Orang Tua</label>
                <input type="text" id="alamat_ortu" name="alamat_ortu">
            </div>
            <div class="form-group">
                <label for="telepon_ortu">Telepon/HP</label>
                <input type="tel" id="telepon_ortu" name="telepon_ortu">
            </div>
            <div class="button-group">
                <button type="button" onclick="window.location.href='<?= base_url('siswa') ?>'">Kembali</button>
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>