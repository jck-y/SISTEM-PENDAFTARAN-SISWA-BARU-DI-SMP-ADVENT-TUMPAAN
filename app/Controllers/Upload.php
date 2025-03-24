<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Upload extends Controller
{
    public function index()
    {
        return view('upload_dokumen');
    }

    public function process()
{
    $validationRules = [
        'foto' => [
            'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
            'label' => 'Foto 3x4'
        ],
        'ijazah' => [
            'rules' => 'uploaded[ijazah]|mime_in[ijazah,image/jpg,image/jpeg,image/png,application/pdf]|max_size[ijazah,2048]',
            'label' => 'Ijazah'
        ],
        'akta' => [
            'rules' => 'uploaded[akta]|mime_in[akta,image/jpg,image/jpeg,image/png,application/pdf]|max_size[akta,2048]',
            'label' => 'Akta Kelahiran'
        ]
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Ambil nama siswa dari session atau form (sesuaikan dengan kebutuhan)
    $namaSiswa = session()->get('nama_lengkap') ?? 'siswa'; // Default jika tidak ada
    $namaSiswa = str_replace(' ', '_', strtolower($namaSiswa));

    // Handle file uploads
    $foto = $this->request->getFile('foto');
    $ijazah = $this->request->getFile('ijazah');
    $akta = $this->request->getFile('akta');

    // Buat nama file berdasarkan nama siswa
    $fotoName = $namaSiswa . '_foto.' . $foto->getExtension();
    $ijazahName = $namaSiswa . '_ijazah.' . $ijazah->getExtension();
    $aktaName = $namaSiswa . '_akta.' . $akta->getExtension();

    // Move files to upload directory
    $foto->move(WRITEPATH . 'uploads/foto', $fotoName);
    $ijazah->move(WRITEPATH . 'uploads/ijazah', $ijazahName);
    $akta->move(WRITEPATH . 'uploads/akta', $aktaName);

    // Simpan nama file ke database (tambahkan logika sesuai model Anda)
    $data = [
        'foto' => $fotoName,
        'ijazah' => $ijazahName,
        'akta' => $aktaName
    ];
    // $this->siswaModel->update($id_siswa, $data); // Uncomment dan sesuaikan jika perlu

    return redirect()->to('success')->with('message', 'Documents uploaded successfully');
}
}