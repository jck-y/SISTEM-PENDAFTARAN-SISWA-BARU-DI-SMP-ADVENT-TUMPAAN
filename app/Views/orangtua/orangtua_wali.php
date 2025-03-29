
<!-- app/Views/orangtua_wali.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru - Orang Tua Kandung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: url('https://static.vecteezy.com/system/resources/previews/009/006/369/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 10px;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120%;
            background: inherit;
            filter: blur(10px); 
            z-index: -1; 
        }

        .back {
            margin-bottom: 20px;
        }
        .back:hover {
            cursor: pointer;
        }
        .back:active {
            transform: scale(0.95);
        }

        .form-wrapper {
            background-color: #2148C0;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }

        .form-header {
            display: flex;
            align-items: center;
            color: white;
            margin-bottom: 20px;
            text-align: center;
            gap: 10px;
        }

        .form-header h2 {
            font-size: 1.4rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header-section {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .form-group {
            display: grid;
            grid-template-columns: 1fr 2fr;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .form-group label {
            color: white;
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            background-color: #fff;
            color: #333;
        }
        .button-group {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .button-group button {
            padding: 12px 20px;
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
            background-color: #FFC107;
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
    <img class="back" src="<?= base_url('assets/back.png'); ?>" alt="close" class="img-fluid mx-auto d-block" width="32" onclick="window.history.back();">
        <div class="form-header">
            <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" width="50">
            <h2>FORMULIR PENDAFTARAN SISWA BARU</h2>
        </div>
        <div class="header-section">
            <h2>ORANG TUA WALI</h2>
        </div>
        <form action="<?= base_url('siswa/save_orangtua_kandung'); ?>" method="post">
            <div class="form-group">
                <label for="nama_lengkap_ayah">Nama Lengkap Ayah Wali</label>
                <input type="text" id="nama_lengkap_ayah" name="nama_lengkap_ayah" required>
            </div>
            <div class="form-group">
                <label for="nama_lengkap_ibu">Nama Lengkap Ibu Wali</label>
                <input type="text" id="nama_lengkap_ibu" name="nama_lengkap_ibu" required>
            </div>
            <div class="form-group">
                <label for="alamat_ayah">Alamat Ayah Wali</label>
                <input type="text" id="alamat_ayah" name="alamat_ayah" required>
            </div>
            <div class="form-group">
                <label for="alamat_ibu">Alamat Ibu Wali</label>
                <input type="text" id="alamat_ibu" name="alamat_ibu" required>
            </div> 
            <div class="form-group">
                <label for="telepon">Telepon/No HP</label>
                <input type="tel" id="telepon" name="telepon" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ayah">Pekerjaan Ayah Wali</label>
                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ibu">Pekerjaan Ibu Wali</label>
                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
            </div>
            <div class="form-group">
                <label for="pendidikan_ayah">Pendidikan Ayah Wali</label>
                <select id="pendidikan_ayah" name="pendidikan_ayah" required>
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
                <label for="pendidikan_ibu">Pendidikan Ibu Wali</label>
                <select id="pendidikan_ibu" name="pendidikan_ibu" required>
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
                <label for="pekerjaan_ayah">Penghasilan Perbulan Ayah</label>
                <input type="text" id="penghasilan_ayah" name="penghasilan_ayah" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ayah">Penghasilan Perbulan Ibu</label>
                <input type="text" id="penghasilan_ibu" name="penghasilan_ibu" required>
            </div>
            <div class="button-group">
                <button type="submit">Berikutnya</button>
            </div>
        </form>
    </div>
        <script>
        // Client-side validation for form submission
        function validateForm() {
            // Check if all required fields are filled out
            let inputs = document.querySelectorAll('input[required], select[required]');
            for (let input of inputs) {
                if (!input.value.trim()) {
                    alert('Harap mengisi semua kolom yang wajib.');
                    input.focus();
                    return false; // Prevent form submission
                }
            }
            return true; // Allow form submission
        }
    </script>
</body>
</html>
