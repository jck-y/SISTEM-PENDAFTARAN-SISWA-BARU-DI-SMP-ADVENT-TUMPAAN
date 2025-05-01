
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

        .validation-message {
            color: #ffcc00;
            font-size: 0.9rem;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .button-group button:disabled {
            background-color: #cccccc;
            color: #666666;
            cursor: not-allowed;
            opacity: 0.7;
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
        <img class="back" src="<?= base_url('assets/back.png'); ?>" alt="close" class="img-fluid mx-auto d-block" width="32" onclick="window.history.back();">
        <div class="form-header">       
            <img src="https://www.simivalleyelementary.org/build/image/3.png?h=200&fit=max&s=db9ab56df5b6520e116417b618007eff" alt="Logo" width="50">
            <h2>FORMULIR PENDAFTARAN SISWA BARU</h2>
        </div>
        <div class="header-section">
            <h2>Upload Dokumen</h2>
        </div>
        <?php if (session()->getFlashdata('validation')): ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('validation') as $field => $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('siswa/upload'); ?>" method="post" enctype="multipart/form-data" id="uploadForm">
            <div class="upload-section">    
                <!-- Foto -->
                <div class="drop-area" id="dropArea">
                    <div class="icon">📷</div>
                    <p>Tambahkan Foto Anda Disini</p>
                    <span class="browse-link" id="browseLink">Browse files</span>
                    <input type="file" id="fileInput" name="gambar" accept="image/*">
                </div>
                <div class="file-preview" id="filePreview">
                    <img id="previewImg" src="#" alt="Pratinjau Gambar">
                    <div class="file-info">
                        <p id="fileName"></p>
                        <p class="file-size" id="fileSize"></p>
                    </div>
                    <button type="button" class="remove-btn" id="removeBtn">✖</button>
                </div>

                <!-- Kartu Keluarga -->
                <div class="drop-area" onclick="document.getElementById('kk').click()">
                    <div class="icon">📷</div>
                    <p>Upload Kartu Keluarga</p>
                    <span class="browse-link">Browse files</span>
                    <input type="file" id="kk" name="kk" accept=".jpg,.jpeg,.png,.pdf" style="display:none">
                </div>
                <div class="file-preview" id="previewKK" style="display:none">
                    <img id="previewImgKK" src="#" alt="Pratinjau Gambar">
                    <div class="file-info">
                        <p id="fileNameKK"></p>
                        <p class="file-size" id="fileSizeKK"></p>
                    </div>
                    <button type="button" class="remove-btn" onclick="removeFile('kk', 'previewKK')">✖</button>
                </div>

                <!-- Raport -->
                <div class="drop-area" onclick="document.getElementById('raport').click()">
                    <div class="icon">📷</div>
                    <p>Upload Raport</p>
                    <span class="browse-link">Browse files</span>
                    <input type="file" id="raport" name="raport" accept=".jpg,.jpeg,.png,.pdf" style="display:none">
                </div>
                <div class="file-preview" id="previewRaport" style="display:none">
                    <img id="previewImgRaport" src="#" alt="Pratinjau Gambar">
                    <div class="file-info">
                        <p id="fileNameRaport"></p>
                        <p class="file-size" id="fileSizeRaport"></p>
                    </div>
                    <button type="button" class="remove-btn" onclick="removeFile('raport', 'previewRaport')">✖</button>
                </div>

                <!-- Akta Kelahiran -->
                <div class="drop-area" onclick="document.getElementById('akta').click()">
                    <div class="icon">📷</div>
                    <p>Upload Akta Kelahiran</p>
                    <span class="browse-link">Browse files</span>
                    <input type="file" id="akta" name="akta" accept=".jpg,.jpeg,.png,.pdf" style="display:none">
                </div>
                <div class="file-preview" id="previewAkta" style="display:none">
                    <img id="previewImgAkta" src="#" alt="Pratinjau Gambar">
                    <div class="file-info">
                        <p id="fileNameAkta"></p>
                        <p class="file-size" id="fileSizeAkta"></p>
                    </div>
                    <button type="button" class="remove-btn" onclick="removeFile('akta', 'previewAkta')">✖</button>
                </div>

                <!-- Surat Keterangan Lulus -->
                <div class="drop-area" onclick="document.getElementById('skl').click()">
                    <div class="icon">📷</div>
                    <p>Upload Surat Keterangan Lulus</p>
                    <span class="browse-link">Browse files</span>
                    <input type="file" id="skl" name="skl" accept=".jpg,.jpeg,.png,.pdf" style="display:none">
                </div>
                <div class="file-preview" id="previewSKL" style="display:none">
                    <img id="previewImgSKL" src="#" alt="Pratinjau Gambar">
                    <div class="file-info">
                        <p id="fileNameSKL"></p>
                        <p class="file-size" id="fileSizeSKL"></p>
                    </div>
                    <button type="button" class="remove-btn" onclick="removeFile('skl', 'previewSKL')">✖</button>
                </div>
                
                <div class="validation-message" id="validationMessage" style="color: white; text-align: center; margin-bottom: 10px; display: none;">
                    Harap unggah semua dokumen yang diperlukan
                </div>
                <div class="button-group">
                    <button type="submit" id="submitButton" disabled>Selesai</button>
                </div>
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

        function checkAllFilesFilled() {
            const requiredInputs = ['fileInput', 'kk', 'raport', 'akta', 'skl'];
            const allFilled = requiredInputs.every(id => {
                const input = document.getElementById(id);
                return input.files && input.files.length > 0;
            });
            
            document.getElementById('submitButton').disabled = !allFilled;
            return allFilled;
        }

        uploadForm.addEventListener('submit', (e) => {
            const requiredFiles = ['fileInput', 'kk', 'raport', 'akta', 'skl'];
            for (let id of requiredFiles) {
                const input = document.getElementById(id);
                if (input.files.length === 0) {
                    e.preventDefault();
                    alert("Harap unggah semua dokumen yang diperlukan!");
                    return;
                }
            }
        });

        document.getElementById('uploadForm').addEventListener('submit', (e) => {
            if (!checkAllFilesFilled()) {
                e.preventDefault();
                alert("Harap unggah semua dokumen yang diperlukan sebelum melanjutkan!");
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('submitButton').disabled = true;
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
            checkAllFilesFilled();
        });

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                previewFile(file);
            }
            checkAllFilesFilled();
        });

        removeBtn.addEventListener('click', () => {
            fileInput.value = '';
            filePreview.style.display = 'none';
            checkAllFilesFilled();
        });

        function previewFile(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                fileSize.textContent = `${Math.round(file.size / 5120)}kb`;
                filePreview.style.display = 'flex';
            };
            reader.readAsDataURL(file);
        }

        function handlePreview(inputId, previewId, nameId, sizeId, imgId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const nameElem = document.getElementById(nameId);
            const sizeElem = document.getElementById(sizeId);
            const imgElem = document.getElementById(imgId);

            input.addEventListener('change', () => {
                const file = input.files[0];
                if (file) {
                    nameElem.textContent = file.name;
                    sizeElem.textContent = `${Math.round(file.size / 1024)} KB`;
                    preview.style.display = 'flex';

                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            imgElem.src = e.target.result;
                            imgElem.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        imgElem.src = '';
                        imgElem.style.display = 'none';
                    }
                } else {
                    preview.style.display = 'none';
                }
                checkAllFilesFilled();
            });
        }

        function removeFile(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            input.value = '';
            preview.style.display = 'none';
            checkAllFilesFilled();
        }

        handlePreview('kk', 'previewKK', 'fileNameKK', 'fileSizeKK', 'previewImgKK');
        handlePreview('raport', 'previewRaport', 'fileNameRaport', 'fileSizeRaport', 'previewImgRaport');
        handlePreview('akta', 'previewAkta', 'fileNameAkta', 'fileSizeAkta', 'previewImgAkta');
        handlePreview('skl', 'previewSKL', 'fileNameSKL', 'fileSizeSKL', 'previewImgSKL');
    </script>
</body>
</html>