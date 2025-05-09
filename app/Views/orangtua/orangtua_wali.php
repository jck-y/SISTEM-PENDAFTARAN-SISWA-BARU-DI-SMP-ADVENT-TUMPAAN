<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru - Orang Tua Wali</title>
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
            height: 100%;
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
        <?php if (session()->getFlashdata('validation')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('validation') as $field => $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('siswa/save_orangtua_wali'); ?>" method="post" id="waliForm">
            <div class="form-group">
                <label for="nama_ayah_wali">Nama Lengkap Ayah Wali</label>
                <input type="text" id="nama_ayah_wali" name="nama_ayah_wali" value="<?= old('nama_ayah_wali') ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_ibu_wali">Nama Lengkap Ibu Wali</label>
                <input type="text" id="nama_ibu_wali" name="nama_ibu_wali" value="<?= old('nama_ibu_wali') ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat_ayah_wali">Alamat Ayah Wali</label>
                <input type="text" id="alamat_ayah_wali" name="alamat_ayah_wali" value="<?= old('alamat_ayah_wali') ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat_ibu_wali">Alamat Ibu Wali</label>
                <input type="text" id="alamat_ibu_wali" name="alamat_ibu_wali" value="<?= old('alamat_ibu_wali') ?>" required>
            </div>
            <div class="form-group">
                <label for="telepon_hp">Telepon/No HP</label>
                <input type="tel" id="telepon_hp" name="telepon_hp" value="<?= old('telepon_hp') ?>" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ayah_wali">Pekerjaan Ayah Wali</label>
                <input type="text" id="pekerjaan_ayah_wali" name="pekerjaan_ayah_wali" value="<?= old('pekerjaan_ayah_wali') ?>" required>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ibu_wali">Pekerjaan Ibu Wali</label>
                <input type="text" id="pekerjaan_ibu_wali" name="pekerjaan_ibu_wali" value="<?= old('pekerjaan_ibu_wali') ?>" required>
            </div>
            <div class="form-group">
                <label for="pendidikan_ayah_wali">Pendidikan Ayah Wali</label>
                <select id="pendidikan_ayah_wali" name="pendidikan_ayah_wali" required>
                    <option value="">Pilih Pendidikan</option>
                    <option value="SD" <?= old('pendidikan_ayah_wali') == 'SD' ? 'selected' : '' ?>>SD</option>
                    <option value="SMP" <?= old('pendidikan_ayah_wali') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                    <option value="SMA" <?= old('pendidikan_ayah_wali') == 'SMA' ? 'selected' : '' ?>>SMA</option>
                    <option value="D3" <?= old('pendidikan_ayah_wali') == 'D3' ? 'selected' : '' ?>>D3</option>
                    <option value="S1" <?= old('pendidikan_ayah_wali') == 'S1' ? 'selected' : '' ?>>S1</option>
                    <option value="S2" <?= old('pendidikan_ayah_wali') == 'S2' ? 'selected' : '' ?>>S2</option>
                    <option value="S3" <?= old('pendidikan_ayah_wali') == 'S3' ? 'selected' : '' ?>>S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pendidikan_ibu_wali">Pendidikan Ibu Wali</label>
                <select id="pendidikan_ibu_wali" name="pendidikan_ibu_wali" required>
                    <option value="">Pilih Pendidikan</option>
                    <option value="SD" <?= old('pendidikan_ibu_wali') == 'SD' ? 'selected' : '' ?>>SD</option>
                    <option value="SMP" <?= old('pendidikan_ibu_wali') == 'SMP' ? 'selected' : '' ?>>SMP</option>
                    <option value="SMA" <?= old('pendidikan_ibu_wali') == 'SMA' ? 'selected' : '' ?>>SMA</option>
                    <option value="D3" <?= old('pendidikan_ibu_wali') == 'D3' ? 'selected' : '' ?>>D3</option>
                    <option value="S1" <?= old('pendidikan_ibu_wali') == 'S1' ? 'selected' : '' ?>>S1</option>
                    <option value="S2" <?= old('pendidikan_ibu_wali') == 'S2' ? 'selected' : '' ?>>S2</option>
                    <option value="S3" <?= old('pendidikan_ibu_wali') == 'S3' ? 'selected' : '' ?>>S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="penghasilan_ayah_wali">Penghasilan Perbulan Ayah Wali</label>
                <select id="penghasilan_ayah_wali" name="penghasilan_ayah_wali" required>
                    <option value="">Pilih Penghasilan</option>
                    <option value="0-2.600.000" <?= old('penghasilan_ayah_wali') == '0-2.600.000' ? 'selected' : '' ?>>0-2.600.000</option>
                    <option value="2.600.000-5.000.000" <?= old('penghasilan_ayah_wali') == '2.600.000-5.000.000' ? 'selected' : '' ?>>2.600.000-5.000.000</option>
                    <option value="lebih dari 5.000.000" <?= old('penghasilan_ayah_wali') == 'lebih dari 5.000.000' ? 'selected' : '' ?>>lebih dari 5.000.000</option>
                </select>
            </div>
            <div class="form-group">
                <label for="penghasilan_ibu_wali">Penghasilan Perbulan Ibu Wali</label>
                <select id="penghasilan_ibu_wali" name="penghasilan_ibu_wali" required>
                    <option value="">Pilih Penghasilan</option>
                    <option value="0-2.600.000" <?= old('penghasilan_ibu_wali') == '0-2.600.000' ? 'selected' : '' ?>>0-2.600.000</option>
                    <option value="2.600.000-5.000.000" <?= old('penghasilan_ibu_wali') == '2.600.000-5.000.000' ? 'selected' : '' ?>>2.600.000-5.000.000</option>
                    <option value="lebih dari 5.000.000" <?= old('penghasilan_ibu_wali') == 'lebih dari 5.000.000' ? 'selected' : '' ?>>lebih dari 5.000.000</option>
                </select>
            </div>
            <div class="button-group">
                <button type="submit" id="btnBerikutnya">Berikutnya</button>
            </div>
        </form>
    </div>
    <script>
        const form = document.getElementById('waliForm');
        const btnBerikutnya = document.getElementById('btnBerikutnya');

        const requiredFields = [
            'nama_ayah_wali', 'nama_ibu_wali', 'alamat_ayah_wali', 'alamat_ibu_wali', 'telepon_hp',
            'pekerjaan_ayah_wali', 'pekerjaan_ibu_wali', 'pendidikan_ayah_wali', 'pendidikan_ibu_wali',
            'penghasilan_ayah_wali', 'penghasilan_ibu_wali'
        ];

        function checkFormValidity() {
            let allFilled = true;
            requiredFields.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (!input.value.trim() || (input.tagName === 'SELECT' && input.value === '')) {
                    allFilled = false;
                }
            });
            btnBerikutnya.disabled = !allFilled;
        }

        requiredFields.forEach(fieldId => {
            const input = document.getElementById(fieldId);
            input.addEventListener('input', checkFormValidity);
            input.addEventListener('change', checkFormValidity);
        });

        form.addEventListener('submit', function(event) {
            let valid = true;
            let emptyFields = [];

            requiredFields.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (!input.value.trim() || (input.tagName === 'SELECT' && input.value === '')) {
                    valid = false;
                    emptyFields.push(input.previousElementSibling.textContent);
                    input.style.borderColor = 'red';
                } else {
                    input.style.borderColor = '';
                }
            });

            if (!valid) {
                event.preventDefault();
                alert(`Harap mengisi semua kolom yang wajib. Kolom yang masih kosong: \n- ${emptyFields.join('\n- ')}`);
            }
        });

        checkFormValidity();
    </script>
</body>
</html>