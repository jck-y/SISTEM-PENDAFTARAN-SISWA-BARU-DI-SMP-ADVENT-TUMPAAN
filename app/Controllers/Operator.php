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

        $data = [
            'nama' => session()->get('nama'),
            'role' => session()->get('role'),
            'siswa' => $this->siswaModel->findAll() // Mengambil semua data siswa
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

        $data = [
            'status' => $status
        ];

        if ($this->siswaModel->update($id_siswa, $data)) {
            return redirect()->to('/operator')->with('success', 'Status siswa berhasil diperbarui');
        } else {
            return redirect()->to('/operator')->with('error', 'Gagal memperbarui status siswa');
        }
    }

    public function detailSiswa($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        // Ambil data siswa
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/operator')->with('error', 'Siswa tidak ditemukan');
        }

        // Ambil data orang tua dan wali (asumsi ada model dan tabel terpisah)
        $orangTuaModel = new \App\Models\OrangTuaModel();
        $waliModel = new \App\Models\WaliModel();
        $orang_tua = $orangTuaModel->where('id_siswa', $id)->first();
        $wali = $waliModel->where('id_siswa', $id)->first();

        $data = [
            'siswa' => $siswa,
            'orang_tua' => $orang_tua,
            'wali' => $wali,
            'nama' => session()->get('nama')
        ];

        // Ubah view ke folder operator
        return view('detail_siswa/detail_siswa', $data);
    }
}