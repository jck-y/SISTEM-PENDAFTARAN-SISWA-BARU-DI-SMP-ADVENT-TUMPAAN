<?php
namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KepalaSekolahModel;
use App\Models\OperatorModel;
use App\Models\SiswaModel;

class Auth extends BaseController
{
    protected $adminModel;
    protected $kepalaSekolahModel;
    protected $operatorModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->kepalaSekolahModel = new KepalaSekolahModel();
        $this->operatorModel = new OperatorModel();
        $this->siswaModel = new SiswaModel();
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
            return redirect()->to('/admin');
        }

        // Cek di tabel kepala_sekolah
        $user = $this->kepalaSekolahModel->where('nama', $nama)->first();
        if ($user && $password === $user['password']) {
            session()->set([
                'id' => $user['id'],
                'nama' => $user['nama'],
                'logged_in' => true
            ]);
            return redirect()->to('/kepsek');
        }

        // Cek di tabel siswa
        $user = $this->siswaModel->where('nama_lengkap', $nama)->first();
        if ($user) {
            if ($password === $user['password']) {
                session()->set([
                    'id_siswa' => $user['id_siswa'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'logged_in' => true
                ]);
                return redirect()->to('/home');
            } 
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

    // Method baru untuk register
    public function register()
    {
        // Langsung redirect ke /siswa tanpa validasi
        session()->set([
            'logged_in' => true // Opsional, tergantung kebutuhan
        ]);
        return redirect()->to('/siswa');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}