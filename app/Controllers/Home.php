<?php
namespace App\Controllers;
use App\Models\SiswaModel;

class Home extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'siswa') {
            return redirect()->to('/auth')->with('error', 'Silakan login terlebih dahulu');
        }

        $id_siswa = session()->get('id_siswa');
        $siswa = $this->siswaModel->find($id_siswa);

        if (!$siswa) {
            session()->destroy();
            return redirect()->to('/auth')->with('error', 'Data siswa tidak ditemukan');
        }

        $data = [
            'nama_lengkap' => $siswa['nama_lengkap'],
            'status' => $siswa['status']
        ];
        return view('home/index', $data);
    }
}