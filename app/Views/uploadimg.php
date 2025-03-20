<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Dokumen - Pendaftaran Siswa Baru</title>
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

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            color: white;
            font-size: 0.85rem;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .form-group input[type="file"] {
            width: 100%;
            padding: 12px;
            background-color: white;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            color: #333;
        }

        .upload-preview {
            width: 100%;
            height: 200px;
            background-color: white;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .upload-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
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
    </style>
</head>
<body>
    <div class="form-wrapper">
        <div class="form-header">
            <h2>Upload Dokumen</h2>
        </div>
        <form action="<?= base_url('upload/process') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto">Foto 3x4</label>
                <div class="upload-preview" id="fotoPreview"></div>
                <input type="file" id="foto" name="foto" accept="image/*" onchange="previewImage(this, 'fotoPreview')">
            </div>
            
            <div class="form-group">
                <label for="ijazah">Scan Ijazah</label>
                <div class="upload-preview" id="ijazahPreview"></div>
                <input type="file" id="ijazah" name="ijazah" accept="image/*,.pdf" onchange="previewImage(this, 'ijazahPreview')">
            </div>

            <div class="form-group">
                <label for="akta">Scan Akta Kelahiran</label>
                <div class="upload-preview" id="aktaPreview"></div>
                <input type="file" id="akta" name="akta" accept="image/*,.pdf" onchange="previewImage(this, 'aktaPreview')">
            </div>

            <div class="button-group">
                <button type="button" onclick="window.history.back()">Kembali</button>
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const file = input.files[0];
            
            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    }
                    reader.readAsDataURL(file);
                } else if (file.type === 'application/pdf') {
                    preview.innerHTML = '<p style="color: #004080;">PDF Document</p>';
                }
            } else {
                preview.innerHTML = '';
            }
        }
    </script>
</body>
</html>