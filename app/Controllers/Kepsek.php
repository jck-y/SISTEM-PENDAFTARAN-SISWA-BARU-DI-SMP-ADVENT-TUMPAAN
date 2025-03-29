<?php
namespace App\Controllers;
use App\Models\SiswaModel;

class Kepsek extends BaseController
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
            'role' => session()->get('role'),
            'nama' => session()->get('nama'),
            'siswa' => $this->siswaModel->findAll() // Mengambil semua data siswa
        ];

        return view('kepsek/kepsek', $data);
    }

    public function detailSiswa($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        // Ambil data siswa
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/kepsek')->with('error', 'Siswa tidak ditemukan');
        }

        // Ambil data orang tua dan wali
        $orangTuaModel = new \App\Models\OrangTuaModel();
        $waliModel = new \App\Models\WaliModel();
        $orang_tua = $orangTuaModel->where('id_siswa', $id)->first();
        $wali = $waliModel->where('id_siswa', $id)->first();

        $data = [
            'siswa' => $siswa,
            'orang_tua' => $orang_tua,
            'wali' => $wali,
            'nama' => session()->get('nama'),
            'role' => 'kepsek' // Tambahkan role untuk menentukan tombol kembali
        ];

        return view('detail_siswa/detail_siswa', $data);
    }
}