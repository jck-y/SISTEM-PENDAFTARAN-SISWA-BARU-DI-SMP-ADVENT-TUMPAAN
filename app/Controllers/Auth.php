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

        if (empty($nama) || empty($password)) {
            return redirect()->back()->with('error', 'Username/Nama lengkap dan password harus diisi');
        }

        // Cek di tabel admin (menggunakan nama sebagai username)
        $admin = $this->adminModel->where('nama', $nama)->first();
        if ($admin) {
            if (password_verify($password, $admin['password']) || $password === $admin['password']) {
                session()->set([
                    'id' => $admin['id'],
                    'nama' => $admin['nama'],
                    'role' => 'admin',
                    'logged_in' => true
                ]);
                return redirect()->to('/admin');
            }
            return redirect()->back()->with('error', 'Password salah untuk admin');
        }

        // Cek di tabel kepala_sekolah (menggunakan nama sebagai username)
        $kepsek = $this->kepalaSekolahModel->where('nama', $nama)->first();
        if ($kepsek) {
            if (password_verify($password, $kepsek['password']) || $password === $kepsek['password']) {
                session()->set([
                    'id' => $kepsek['id'],
                    'nama' => $kepsek['nama'],
                    'role' => 'kepsek',
                    'logged_in' => true
                ]);
                return redirect()->to('/kepsek');
            }
            return redirect()->back()->with('error', 'Password salah untuk kepala sekolah');
        }

        // Cek di tabel operator (menggunakan nama sebagai username)
        $operator = $this->operatorModel->where('nama', $nama)->first();
        if ($operator) {
            if (password_verify($password, $operator['password']) || $password === $operator['password']) {
                session()->set([
                    'id' => $operator['id'],
                    'nama' => $operator['nama'],
                    'role' => 'operator',
                    'logged_in' => true
                ]);
                return redirect()->to('/operator');
            }
            return redirect()->back()->with('error', 'Password salah untuk operator');
        }

        // Cek di tabel siswa (menggunakan nama_lengkap)
        $siswa = $this->siswaModel->where('nama_lengkap', $nama)->first();
        if ($siswa) {
            if (password_verify($password, $siswa['password']) || $password === $siswa['password']) {
                session()->set([
                    'id_siswa' => $siswa['id_siswa'],
                    'nama_lengkap' => $siswa['nama_lengkap'],
                    'role' => 'siswa',
                    'logged_in' => true
                ]);
                return redirect()->to('/home');
            }
            return redirect()->back()->with('error', 'Password salah untuk siswa');
        }

        return redirect()->back()->with('error', 'Username atau nama lengkap tidak ditemukan');
    }

    public function register()
    {
        return redirect()->to('/siswa');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}