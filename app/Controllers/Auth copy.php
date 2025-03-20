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
        $role = $this->request->getPost('role');

        switch ($role) {
            case 'admin':
                $user = $this->adminModel->where('nama', $nama)->first();
                break;
            case 'kepala_sekolah':
                $user = $this->kepalaSekolahModel->where('nama', $nama)->first();
                break;
            case 'operator':
                $user = $this->operatorModel->where('nama', $nama)->first();
                break;
            default:
                return redirect()->back()->with('error', 'Role tidak valid');
        }

        if ($user) {
            // Catatan: untuk operator tidak ada kolom password di database Anda
            if ($role != 'operator' && $password === $user['password']) { // Ganti password_verify dengan perbandingan langsung
                session()->set([
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'role' => $role,
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            } elseif ($role == 'operator') {
                session()->set([
                    'id' => $user['id'],
                    'nama' => $user['nama'],
                    'role' => $role,
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            }
            return redirect()->back()->with('error', 'Password salah');
        }
        return redirect()->back()->with('error', 'Nama pengguna tidak ditemukan');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}