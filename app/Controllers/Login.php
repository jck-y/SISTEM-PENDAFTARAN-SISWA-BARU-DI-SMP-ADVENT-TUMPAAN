<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KepalaSekolahModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
        
    public function auth()
    {
        $session = session();
        $adminModel = new AdminModel();
        $kepalaSekolahModel = new KepalaSekolahModel();

        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');

        // Cek di tabel admin
        $admin = $adminModel->getAdminByNama($nama);
        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'nama' => $admin['nama'],
                'role' => 'admin',
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        }

        // Cek di tabel kepala_sekolah
        $kepalaSekolah = $kepalaSekolahModel->getKepalaSekolahByNama($nama);
        if ($kepalaSekolah && password_verify($password, $kepalaSekolah['password'])) {
            $session->set([
                'nama' => $kepalaSekolah['nama'],
                'role' => 'kepala_sekolah',
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        }

        // Jika gagal login
        $session->setFlashdata('error', 'Nama atau password salah');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}