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
            height: 175%;
            background: inherit;
            filter: blur(10px); 
            z-index: -1; 
        }

        .form-wrapper {
            background-color: #2148C0; 
            padding: 20px;
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
            margin-right: 10px; 
        }

        .form-group input,
        .form-group select {
            flex: 2; 
            width: auto; 
            padding: 12px; 
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
        .header-section{
            text-align: center;
            color: white;
            margin-bottom: 20px;
            gap: 10px;
            align-items: center;
            margin-top: 50px;
        }
        .button-group button:hover {
            background-color: #FFC107;
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
<!--             <h2>FORMULIR PENDAFTARAN SISWA BARU</h2>
        </div> -->
        <!-- <div>
            <h1>Selamat Datang, <?= $nama ?></h1>
            <a href="/auth/logout" class="btn btn-danger">Logout</a>
        </div> -->
        
<!--         <form action="<?= base_url('siswa/save_siswa'); ?>" method="post" id="siswaForm"> -->
            <!-- Form fields tetap sama -->
            <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" class="img-fluid mx-auto d-block" width="50">
            <h2>FORMULIR PENDAFTARAN SISWA BARU</h2>
        </div>
        <div class="header-section">
        <h2>SISWA</h2>
        </div>
        <form action="<?= base_url('siswa/save_siswa'); ?>" method="post" id="siswaForm">
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
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir">
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
                <label for="status">Status Anak</label>
                <select id="status" name="status">
                    <option value="">Status Anak Dalam Keluarga</option>
                    <option value="Anak Kandung">Anak Kandung</option>
                    <option value="Anak Angkat">Anak Angkat</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" name="status">
            </div> -->
            <div class="header-section">
            <h2>ALAMAT SISWA</h2>
            </div>

            <div class="form-group">
                <label for="alamat_siswa">Alamat Siswa :</label>
                <input type="text" id="alamat_siswa" name="alamat_siswa">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon/HP</label>
                <input type="tel" id="telepon" name="telepon">
            </div>
            <div class="header-section">
            <h2>NAMA TK ASAL</h2>
            </div>
            <div class="form-group">
                <label for="nama_tk_asal">Nama TK Asal:</label>
                <input type="text" id="nama_tk_asal" name="nama_tk_asal">
            </div>

            <div class="form-group">
                <label for="alamat_sekolah">Alamat TK</label>
                <input type="text" id="alamat_sekolah" name="alamat_sekolah">
            </div>

            <div class="button-group">
                <button type="submit" name="redirect_to" value="orangtua_kandung" id="btnKandung">Orang Tua Kandung</button>
                <button type="submit" name="redirect_to" value="orangtua_wali" id="btnWali">Orang Tua Wali</button>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('siswaForm');
        const btnKandung = document.getElementById('btnKandung');
        const btnWali = document.getElementById('btnWali');
        
        // Daftar semua field yang wajib diisi
        const requiredFields = [
            'nama_lengkap', 'nama_panggilan', 'nomor_induk_asal', 'nisn',
            'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama',
            'anak_ke', 'alamat_siswa', 'nama_sekolah', 'nama_tk_asal',
            'telepon', 'alamat_sekolah'
        ];

        // Fungsi untuk memeriksa apakah semua field sudah terisi
        function checkFormValidity() {
            let allFilled = true;
            
            requiredFields.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (!input.value.trim() || (input.tagName === 'SELECT' && input.value === '')) {
                    allFilled = false;
                }
            });

            // Aktifkan atau nonaktifkan tombol berdasarkan status pengisian form
            btnKandung.disabled = !allFilled;
            btnWali.disabled = !allFilled;
        }

        // Event listener untuk setiap perubahan pada input
        requiredFields.forEach(fieldId => {
            const input = document.getElementById(fieldId);
            input.addEventListener('input', checkFormValidity);
            input.addEventListener('change', checkFormValidity);
        });

        // Validasi saat tombol diklik meskipun disabled (untuk keamanan tambahan)
        btnKandung.addEventListener('click', function(event) {
            if (this.disabled) {
                event.preventDefault();
                alert("Form tidak boleh kosong! Semua kolom wajib diisi sebelum melanjutkan ke Orang Tua Kandung.");
            }
        });

        btnWali.addEventListener('click', function(event) {
            if (this.disabled) {
                event.preventDefault();
                alert("Form tidak boleh kosong! Semua kolom wajib diisi sebelum melanjutkan ke Orang Tua Wali.");
            }
        });

        // Validasi saat submit
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

        // Cek validitas form saat pertama kali dimuat
        checkFormValidity();
// =======
//         // Menambahkan validasi sebelum submit form
//         document.getElementById('siswaForm').addEventListener('submit', function(event) {
//             // Mengambil semua field wajib
//             let valid = true;
//             const requiredFields = [
//                 'nama_lengkap', 'nama_panggilan', 'nomor_induk_asal', 'nisn', 
//                 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 
//                 'anak_ke', 'status', 'alamat_siswa', 'nama_sekolah', 
//                 'nama_tk_asal', 'telepon', 'alamat_sekolah'
//             ];

//             // Cek jika ada field yang kosong
//             for (let field of requiredFields) {
//                 let input = document.getElementById(field);
//                 if (!input || input.value.trim() === '') {
//                     valid = false;
//                     input.style.borderColor = 'red'; // Tandai dengan border merah
//                 } else {
//                     input.style.borderColor = ''; // Reset border jika sudah terisi
//                 }
//             }

//             if (!valid) {
//                 event.preventDefault(); // Hentikan form submission jika ada field kosong
//                 alert("Harap mengisi semua kolom yang wajib!");
//             }
//         });
// >>>>>>> pagesSiswa
    </script>
</body>
</html>