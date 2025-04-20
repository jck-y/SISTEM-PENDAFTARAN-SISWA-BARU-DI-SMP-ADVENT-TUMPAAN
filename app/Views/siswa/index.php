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
            height: 145%;
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
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 350px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .form-header {
            display: flex;
            text-align: center;
            color: white;
            margin-bottom: 20px;
            gap: 10px;
            align-items: center;
        }

        .form-header h2 {
            font-size: 1.2rem; 
            font-weight: bold;
            text-transform: uppercase;
        }

        .form-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-group label {
            flex: 1; 
            color: white;
            font-size: 0.85rem; 
            font-weight: bold;
            text-transform: uppercase;
            margin-right: 5px; 
        }

        .form-group input,
        .form-group select {
            flex: 1; 
            width: 55px; 
            padding: 7px; 
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            background-color: #fff;
            color: #333;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            box-shadow: 0 0 5px #FFC107;
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
        .header-section {
            text-align: center;
            color: white;
            margin-bottom: 10px;
            gap: 10px;
            align-items: center;
            margin-top: 25px;
        }
        .button-group button:hover {
            background-color: #FFC107;
        }

        /* Highlighted fields (ANAK KE) */
        .highlighted-field {
            background-color: #e0f0ff;
        }

        /* Responsive Design for Desktop */
        @media (min-width: 768px) {
            .form-wrapper {
                max-width: 600px;
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
    <img class="back" src="<?= base_url('assets/back.png'); ?>" alt="close" class="img-fluid mx-auto d-block" width="32" onclick="window.history.back();">
        <div class="form-header">
            <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" class="img-fluid mx-auto d-block" width="50">
            <h2>FORMULIR PENDAFTARAN SISWA BARU</h2>
        </div>
        <div class="header-section">
            <h2>SISWA</h2>
        </div>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('error')): ?>
            <div style="color: #FFC107; text-align: center; margin-bottom: 15px;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('validation')): ?>
            <div style="color: #FFC107; text-align: center; margin-bottom: 15px;">
                <?php foreach (session()->getFlashdata('validation') as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('siswa/save_siswa'); ?>" method="post" id="siswaForm">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap') ?>">
            </div>
            <div class="form-group">
                <label for="nama_panggilan">Nama Panggilan</label>
                <input type="text" id="nama_panggilan" name="nama_panggilan" value="<?= old('nama_panggilan') ?>">
            </div>
            <div class="form-group">
                <label for="nomor_induk_asal">Nomor Induk Asal</label>
                <input type="text" id="nomor_induk_asal" name="nomor_induk_asal" value="<?= old('nomor_induk_asal') ?>">
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" value="<?= old('nisn') ?>">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir') ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" min="2013-01-01" max="<?= date('Y-m-d') ?>">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <select id="agama" name="agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam" <?= old('agama') == 'Islam' ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= old('agama') == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                    <option value="Katolik" <?= old('agama') == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                    <option value="Hindu" <?= old('agama') == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                    <option value="Buddha" <?= old('agama') == 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                    <option value="Konghucu" <?= old('agama') == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="anak_ke">Anak ke</label>
                <input type="number" id="anak_ke" name="anak_ke" class="highlighted-field" value="<?= old('anak_ke') ?>">
            </div>
            <div class="form-group">
                <label for="status_anak">Status Anak</label>
                <select id="status_anak" name="status_anak">
                    <option value="">Pilih Status</option>
                    <option value="Anak Kandung" <?= old('status_anak') == 'Anak Kandung' ? 'selected' : '' ?>>Anak Kandung</option>
                    <option value="Anak Angkat" <?= old('status_anak') == 'Anak Angkat' ? 'selected' : '' ?>>Anak Angkat</option>
                    <option value="Lainnya" <?= old('status_anak') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                </select>
            </div>
            <div class="header-section">
                <h2>ALAMAT SISWA</h2>
            </div>
            <div class="form-group">
                <label for="alamat_siswa">Alamat</label>
                <input type="text" id="alamat_siswa" name="alamat_siswa" value="<?= old('alamat_siswa') ?>">
            </div>
            <div class="form-group">
                <label for="telepon_siswa">No. Telpon</label>
                <input type="tel" id="telepon_siswa" name="telepon_siswa" value="<?= old('telepon_siswa') ?>">
            </div>
            <div class="header-section">
                <h2>SD ASAL</h2>
            </div>
            <div class="form-group">
                <label for="nama_tk_asal">Nama SD Asal</label>
                <input type="text" id="nama_tk_asal" name="nama_tk_asal" value="<?= old('nama_tk_asal') ?>">
            </div>
            <div class="form-group">
                <label for="alamat_tk_asal">Alamat SD</label>
                <input type="text" id="alamat_tk_asal" name="alamat_tk_asal" value="<?= old('alamat_tk_asal') ?>">
            </div>

            <div class="button-group">
                <button type="submit" name="redirect_to" value="orangtua_kandung" id="btnOrangTua">Orang Tua</button>
                <button type="submit" name="redirect_to" value="orangtua_wali" id="btnOrangTuaWali">Orang Tua Wali</button>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('siswaForm');
        const btnOrangTua = document.getElementById('btnOrangTua');
        const btnOrangTuaWali = document.getElementById('btnOrangTuaWali');
        const tanggalLahirInput = document.getElementById('tanggal_lahir');

        const requiredFields = [
            'nama_lengkap', 'nama_panggilan', 'nomor_induk_asal', 'nisn',
            'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama',
            'anak_ke', 'status_anak', 'alamat_siswa', 'nama_tk_asal',
            'telepon_siswa', 'alamat_tk_asal'
        ];

        function checkFormValidity() {
            let allFilled = true;
            requiredFields.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (!input.value.trim() || (input.tagName === 'SELECT' && input.value === '')) {
                    allFilled = false;
                }
            });
            btnOrangTua.disabled = !allFilled;
            btnOrangTuaWali.disabled = !allFilled;
        }

        // Validasi tanggal lahir di sisi klien
        tanggalLahirInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const minDate = new Date('2013-01-01');
            const today = new Date();

            if (selectedDate < minDate) {
                alert('Tanggal lahir minimal harus pada tahun 2013.');
                this.value = '';
                checkFormValidity();
            } else if (selectedDate > today) {
                alert('Tanggal lahir tidak boleh melebihi tanggal saat ini.');
                this.value = '';
                checkFormValidity();
            }
        });

        requiredFields.forEach(fieldId => {
            const input = document.getElementById(fieldId);
            input.addEventListener('input', checkFormValidity);
            input.addEventListener('change', checkFormValidity);
        });

        btnOrangTua.addEventListener('click', function(event) {
            if (this.disabled) {
                event.preventDefault();
                alert("Form tidak boleh kosong! Semua kolom wajib diisi sebelum melanjutkan ke Orang Tua.");
            }
        });

        btnOrangTuaWali.addEventListener('click', function(event) {
            if (this.disabled) {
                event.preventDefault();
                alert("Form tidak boleh kosong! Semua kolom wajib diisi sebelum melanjutkan ke Orang Tua Wali.");
            }
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
                alert(`Form tidak boleh kosong! Semua kolom wajib diisi. Kolom yang masih kosong: \n- ${emptyFields.join('\n- ')}`);
            }
        });

        checkFormValidity();
    </script>
</body>
</html>