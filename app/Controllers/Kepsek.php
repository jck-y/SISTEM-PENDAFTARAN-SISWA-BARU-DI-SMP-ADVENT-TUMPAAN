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

        $siswa = $this->siswaModel->findAll();
        $data = [
            'siswa' => $siswa,
            'nama' => session()->get('nama'),
            'role' => session()->get('role'),
        ];

        return view('kepsek/kepsek', $data);
    }
}