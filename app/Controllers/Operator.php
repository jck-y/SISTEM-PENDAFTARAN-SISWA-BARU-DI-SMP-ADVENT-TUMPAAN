<?php
namespace App\Controllers;
use App\Models\SiswaModel;

class Operator extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $search = $this->request->getGet('search');

        if ($search) {
            $siswa = $this->siswaModel->like('nama_lengkap', $search)->findAll();
        } else {
            $siswa = $this->siswaModel->findAll();
        }

        $data = [
            'role' => session()->get('role'),
            'nama' => session()->get('nama'),
            'siswa' => $siswa,
            'search' => $search
        ];

        return view('operator/operator', $data);
    }

    public function update_status()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $id_siswa = $this->request->getPost('id_siswa');
        $status = $this->request->getPost('status');

        log_message('debug', 'Menerima data untuk update status: id_siswa=' . $id_siswa . ', status=' . $status);

        // Validasi status
        $validStatuses = ['diproses', 'diterima', 'ditolak']; // Ubah 'pending' menjadi 'diproses'
        if (!in_array($status, $validStatuses)) {
            log_message('error', 'Status tidak valid: ' . $status . ' untuk id_siswa: ' . $id_siswa);
            return redirect()->to('/operator')->with('error', 'Status tidak valid.');
        }

        $data = [
            'status' => $status
        ];

        // Cek apakah siswa dengan id_siswa ada
        $siswa = $this->siswaModel->find($id_siswa);
        if (!$siswa) {
            log_message('error', 'Siswa tidak ditemukan untuk id_siswa: ' . $id_siswa);
            return redirect()->to('/operator')->with('error', 'Siswa tidak ditemukan.');
        }

        try {
            if ($this->siswaModel->update($id_siswa, $data)) {
                log_message('debug', 'Status siswa diperbarui menjadi: ' . $status . ' untuk id_siswa: ' . $id_siswa);
                return redirect()->to('/operator')->with('success', 'Status siswa berhasil diperbarui');
            } else {
                log_message('error', 'Gagal memperbarui status siswa untuk id_siswa: ' . $id_siswa);
                return redirect()->to('/operator')->with('error', 'Gagal memperbarui status siswa');
            }
        } catch (\Exception $e) {
            log_message('error', 'Kesalahan saat memperbarui status siswa: ' . $e->getMessage());
            return redirect()->to('/operator')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function detailSiswa($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/operator')->with('error', 'Siswa tidak ditemukan');
        }

        $orangTuaModel = new \App\Models\OrangTuaModel();
        $waliModel = new \App\Models\WaliModel();
        $orang_tua = $orangTuaModel->where('id_siswa', $id)->first();
        $wali = $waliModel->where('id_siswa', $id)->first();

        // Pastikan path dokumen dapat diakses
        $documents = ['gambar', 'kk', 'akta', 'raport', 'skl'];
        $documentPaths = [];
        foreach ($documents as $doc) {
            if (!empty($siswa[$doc])) {
                // Jika path tidak diawali dengan 'uploads/', tambahkan secara manual
                $docPath = $siswa[$doc];
                if (strpos($docPath, 'uploads/') !== 0) {
                    $docPath = 'uploads/' . $docPath;
                }
                $filePath = FCPATH . $docPath;
                log_message('debug', 'Memeriksa dokumen: ' . $doc . ', Path: ' . $filePath);
                if (file_exists($filePath)) {
                    $documentPaths[$doc] = base_url($docPath);
                    log_message('debug', 'Dokumen ditemukan: ' . $docPath);
                } else {
                    $documentPaths[$doc] = null;
                    log_message('debug', 'Dokumen tidak ditemukan: ' . $docPath);
                }
            } else {
                $documentPaths[$doc] = null;
                log_message('debug', 'Dokumen kosong untuk: ' . $doc);
            }
        }

        $data = [
            'siswa' => $siswa,
            'orang_tua' => $orang_tua,
            'wali' => $wali,
            'documents' => $documentPaths,
            'nama' => session()->get('nama'),
            'role' => 'operator'
        ];

        return view('detail_siswa/detail_siswa', $data);
    }
}