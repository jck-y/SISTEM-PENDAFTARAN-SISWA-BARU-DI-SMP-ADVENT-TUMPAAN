<?php
namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KepalaSekolahModel;
use App\Models\OperatorModel;

class Auth extends BaseController
{
    protected $adminModel;
    protected $kepalaSekolahModel;
    protected $operatorModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->kepalaSekolahModel = new KepalaSekolahModel();
        $this->operatorModel = new OperatorModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');

        // Cek di tabel admin
        $user = $this->adminModel->where('nama', $nama)->first();
        if ($user && $password === $user['password']) {
            session()->set([
                'id' => $user['id'],
                'nama' => $user['nama'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        }

        // Cek di tabel kepala_sekolah
        $user = $this->kepalaSekolahModel->where('nama', $nama)->first();
        if ($user && $password === $user['password']) {
            session()->set([
                'id' => $user['id'],
                'nama' => $user['nama'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        }

        // Cek di tabel operator (tanpa password)
        $user = $this->operatorModel->where('nama', $nama)->first();
        if ($user) {
            session()->set([
                'id' => $user['id'],
                'nama' => $user['nama'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        }

        // Jika tidak ditemukan di semua tabel
        return redirect()->back()->with('error', 'Nama pengguna atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}