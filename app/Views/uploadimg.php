
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru - Upload Gambar</title>
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
            background-color: #004080;
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 390px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-header {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        .form-header h2 {
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .form-header h3 {
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 5px;
        }

        .drop-area {
            border: 2px dashed #fff;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 0.9rem;
            margin-bottom: 15px;
            background-color: rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .drop-area.dragover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .drop-area input[type="file"] {
            display: none;
        }

        .preview {
            margin-top: 15px;
            text-align: center;
        }

        .preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 5px;
            display: none;
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

        @media (min-width: 768px) {
            .form-wrapper {
                max-width: 600px;
                padding: 30px;
            }

            .form-header h2 {
                font-size: 1.5rem;
            }

            .form-header h3 {
                font-size: 1.2rem;
            }

            .drop-area {
                font-size: 1rem;
                padding: 30px;
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
            <h3>UPLOAD GAMBAR</h3>
        </div>
        <form action="<?= base_url('siswa/upload'); ?>" method="post" enctype="multipart/form-data" id="uploadForm">
            <div class="drop-area" id="dropArea">
                <p>Seret dan lepaskan gambar di sini atau klik untuk memilih file</p>
                <input type="file" id="fileInput" name="gambar" accept="image/*">
            </div>
            <div class="preview">
                <img id="previewImg" src="#" alt="Pratinjau Gambar">
            </div>
            <div class="button-group">
                <button type="submit" id="submitButton" disabled>Simpan</button>
            </div>
        </form>
    </div>

    <script>
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');
        const previewImg = document.getElementById('previewImg');
        const submitButton = document.getElementById('submitButton');
        const uploadForm = document.getElementById('uploadForm');

        // Enable/Disable the submit button based on file input
        function toggleSubmitButton() {
            if (fileInput.files.length > 0) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        // Show an alert if trying to submit without an image
        uploadForm.addEventListener('submit', (e) => {
            if (fileInput.files.length === 0) {
                e.preventDefault(); // Prevent form submission
                alert("Harap unggah gambar terlebih dahulu!");
            }
        });

        // Ketika area diklik, buka pemilih file
        dropArea.addEventListener('click', () => {
            fileInput.click();
        });

        // Drag and drop events
        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('dragover');
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('dragover');
        });

        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                fileInput.files = e.dataTransfer.files;
                previewImage(file);
            }
            toggleSubmitButton(); // Enable or disable the submit button
        });

        // Ketika file dipilih melalui input
        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                previewImage(file);
            }
            toggleSubmitButton(); // Enable or disable the submit button
        });

        // Fungsi untuk menampilkan pratinjau gambar
        function previewImage(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>