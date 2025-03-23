
<!-- app/Views/upload_gambar.php -->

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
            background: url('https://static.vecteezy.com/system/resources/previews/015/227/308/non_2x/abstract-blue-and-yellow-geometric-gradient-background-vector.jpg') no-repeat center center fixed;
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

        .form-wrapper {
            background-color: #2148C0; /* Blue background from Figma */
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
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            font-size: 0.9rem;
            margin-bottom: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .drop-area.dragover {
            background-color: #e0e0e0;
        }

        .drop-area input[type="file"] {
            display: none;
        }
        .header-section {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }
        .drop-area .icon {
            font-size: 2rem;
            color: #004080;
            margin-bottom: 10px;
        }

        .drop-area p {
            color: #333;
            margin-bottom: 10px;
        }

        .drop-area .browse-link {
            color: #004080;
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
        }

        .file-preview {
            display: none;
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-preview img {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            object-fit: cover;
        }

        .file-preview .file-info {
            flex: 1;
        }

        .file-preview .file-info p {
            color: #333;
            font-size: 0.85rem;
            margin: 0;
        }

        .file-preview .file-info .file-size {
            color: #666;
            font-size: 0.8rem;
        }

        .file-preview .remove-btn {
            background: none;
            border: none;
            color: #666;
            font-size: 1rem;
            cursor: pointer;
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

        .button-group button:disabled {
            background-color: #ccc;
            color: #666;
            cursor: not-allowed;
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
            .drop-area .icon {
                font-size: 2.5rem;
            }

            .file-preview {
                padding: 15px;
            }

            .file-preview img {
                width: 50px;
                height: 50px;
            }

            .file-preview .file-info p {
                font-size: 1rem;
            }

            .file-preview .file-info .file-size {
                font-size: 0.9rem;
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
            <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" width="50">
            <h2>FORMULIR PENDAFTARAN SISWA BARU</h2>
        </div>
        <div class="header-section">
            <h2>Upload Gambar</h2>
        </div>
        <form action="<?= base_url('siswa/upload'); ?>" method="post" enctype="multipart/form-data" id="uploadForm">
            <div class="drop-area" id="dropArea">
                <div class="icon">📷</div>
                <p>Tambahkan Foto Anda Disini</p>
                <span class="browse-link" id="browseLink">Browse files</span>
                <input type="file" id="fileInput" name="gambar" accept="image/*">
            </div>
            <div class="file-preview" id="filePreview">
                <img id="previewImg" src="#" alt="Pratinjau Gambar">
                <div class="file-info">
                    <p id="fileName">woman_portrait.jpg</p>
                    <p class="file-size" id="fileSize">500kb</p>
                </div>
                <button type="button" class="remove-btn" id="removeBtn">✖</button>
            </div>
            <div class="button-group">
                <button type="submit" id="submitButton" disabled>Selesai</button>
            </div>
        </form>
    </div>

    <script>
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');
        const browseLink = document.getElementById('browseLink');
        const filePreview = document.getElementById('filePreview');
        const previewImg = document.getElementById('previewImg');
        const fileName = document.getElementById('fileName');
        const fileSize = document.getElementById('fileSize');
        const removeBtn = document.getElementById('removeBtn');
        const submitButton = document.getElementById('submitButton');
        const uploadForm = document.getElementById('uploadForm');
        function toggleSubmitButton() {
            if (fileInput.files.length > 0) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
        uploadForm.addEventListener('submit', (e) => {
            if (fileInput.files.length === 0) {
                e.preventDefault(); 
                alert("Harap unggah gambar terlebih dahulu!");
            }
        });

        dropArea.addEventListener('click', () => {
            fileInput.click();
        });

        browseLink.addEventListener('click', (e) => {
            e.stopPropagation(); 
            fileInput.click();
        });

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
                previewFile(file);
            }
            toggleSubmitButton();
        });

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                previewFile(file);
            }
            toggleSubmitButton();
        });

        removeBtn.addEventListener('click', () => {
            fileInput.value = ''; 
            filePreview.style.display = 'none';
            toggleSubmitButton();
        });

        function previewFile(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                fileSize.textContent = `${Math.round(file.size / 1024)}kb`;
                filePreview.style.display = 'flex';
            };
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>