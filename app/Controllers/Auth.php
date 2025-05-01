<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\OrangTuaModel;
use App\Models\WaliModel;
use App\Models\AdminModel;
use App\Models\OperatorModel;
use App\Models\KepalaSekolahModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $siswaModel;
    protected $orangTuaModel;
    protected $waliModel;
    protected $adminModel;
    protected $operatorModel;
    protected $kepalaSekolahModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->siswaModel = new SiswaModel();
        $this->orangTuaModel = new OrangTuaModel();
        $this->waliModel = new WaliModel();
        $this->adminModel = new AdminModel();
        $this->operatorModel = new OperatorModel();
        $this->kepalaSekolahModel = new KepalaSekolahModel();
    }

    public function login()
    {
        log_message('debug', 'Memasuki metode login');
        $method = $this->request->getMethod();
        log_message('debug', 'Request method: ' . $method);

        if (strtolower($method) === 'post') {
            log_message('debug', 'Menerima POST request untuk login');
            $postData = $this->request->getPost();
            log_message('debug', 'Data POST: ' . json_encode($postData));

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $selectedRole = $this->request->getPost('role'); // Ambil role yang dipilih dari form

            if (empty($username) || empty($password) || empty($selectedRole)) {
                log_message('error', 'Username, password, atau role kosong');
                session()->setFlashdata('error', 'Username, password, dan role harus diisi.');
                return redirect()->to('auth/login');
            }

            $role = null;
            $id = null;
            $usernameFound = null;

            // Cek berdasarkan role yang dipilih
            switch ($selectedRole) {
                case 'siswa':
                    // Cek di tabel users (untuk siswa, password di-hash)
                    $user = $this->userModel->where('LOWER(username)', strtolower($username))->first();
                    log_message('debug', 'Hasil query users: ' . json_encode($user));
                    if ($user && password_verify($password, $user['password'])) {
                        $role = 'siswa';
                        $id = $user['id_user'];
                        $usernameFound = $user['username'];
                        log_message('debug', 'Siswa ditemukan: ' . $usernameFound);
                    }
                    break;

                case 'admin':
                    // Cek di tabel admin (password plaintext)
                    $admin = $this->adminModel->where('LOWER(username)', strtolower($username))->first();
                    log_message('debug', 'Hasil query admin: ' . json_encode($admin));
                    if ($admin && $password === $admin['password']) { // Password plaintext
                        $role = 'admin';
                        $id = $admin['id'];
                        $usernameFound = $admin['username'];
                        log_message('debug', 'Admin ditemukan: ' . $usernameFound);
                    }
                    break;

                case 'operator':
                    // Cek di tabel operator (password plaintext)
                    $operator = $this->operatorModel->where('LOWER(username)', strtolower($username))->first();
                    log_message('debug', 'Hasil query operator: ' . json_encode($operator));
                    if ($operator && $password === $operator['password']) { // Password plaintext
                        $role = 'operator';
                        $id = $operator['id'];
                        $usernameFound = $operator['username'];
                        log_message('debug', 'Operator ditemukan: ' . $usernameFound);
                    }
                    break;

                case 'kepsek':
                    // Cek di tabel kepsek (password plaintext)
                    $kepalaSekolah = $this->kepalaSekolahModel->where('LOWER(username)', strtolower($username))->first();
                    log_message('debug', 'Hasil query kepala_sekolah: ' . json_encode($kepalaSekolah));
                    if ($kepalaSekolah && $password === $kepalaSekolah['password']) { // Password plaintext
                        $role = 'kepsek';
                        $id = $kepalaSekolah['id'];
                        $usernameFound = $kepalaSekolah['username'];
                        log_message('debug', 'Kepala Sekolah ditemukan: ' . $usernameFound);
                    }
                    break;

                default:
                    log_message('error', 'Role tidak valid: ' . $selectedRole);
                    session()->setFlashdata('error', 'Role tidak valid.');
                    return redirect()->to('auth/login');
            }

            // Jika tidak ditemukan kecocokan berdasarkan role yang dipilih
            if (!$role) {
                log_message('error', 'User tidak ditemukan untuk role ' . $selectedRole . ': ' . $username);
                session()->setFlashdata('error', 'Username atau password salah untuk role yang dipilih.');
                return redirect()->to('auth/login');
            }

            // Jika pengguna ditemukan, simpan data ke sesi dan redirect
            log_message('debug', 'User ditemukan: ' . $usernameFound . ', Role: ' . $role);
            session()->set([
                'id_user' => $id,
                'username' => $usernameFound,
                'role' => $role,
                'logged_in' => true
            ]);

            log_message('info', 'User logged in: ' . $usernameFound . ', Role: ' . $role);

            // Arahkan pengguna berdasarkan role
            if ($role === 'siswa') {
                $siswa = $this->siswaModel->where('id_user', $id)->first();
                if (!$siswa) {
                    log_message('debug', 'Data siswa tidak ditemukan, redirect ke form pendaftaran');
                    return redirect()->to('siswa');
                }

                // Cek data orang tua dan wali
                $orangTua = $this->orangTuaModel->where('id_siswa', $siswa['id_siswa'])->first();
                log_message('debug', 'Data orang tua: ' . json_encode($orangTua));
                $wali = $this->waliModel->where('id_siswa', $siswa['id_siswa'])->first();
                log_message('debug', 'Data wali: ' . json_encode($wali));

                // Jika belum ada data orang tua maupun wali, arahkan ke form siswa
                if (!$orangTua && !$wali) {
                    log_message('debug', 'Data orang tua dan wali tidak ditemukan, redirect ke /siswa');
                    return redirect()->to('siswa')->with('error', 'Silakan isi data orang tua atau wali terlebih dahulu.');
                }

                // Cek semua dokumen
                $documents = ['gambar', 'kk', 'raport', 'akta', 'skl'];
                $missingDocs = [];
                foreach ($documents as $doc) {
                    if (empty($siswa[$doc]) || trim($siswa[$doc]) === '') {
                        $missingDocs[] = $doc;
                    }
                }
                if (!empty($missingDocs)) {
                    log_message('debug', 'Dokumen tidak lengkap: ' . implode(', ', $missingDocs) . ', redirect ke form upload');
                    return redirect()->to('siswa/uploadimg');
                }

                // Jika semua data lengkap, ke home
                log_message('debug', 'Semua data lengkap, redirect ke home');
                return redirect()->to('home');
            } elseif ($role === 'admin') {
                log_message('debug', 'Redirect ke admin dashboard');
                return redirect()->to('admin');
            } elseif ($role === 'operator') {
                log_message('debug', 'Redirect ke operator dashboard');
                return redirect()->to('operator');
            } elseif ($role === 'kepsek') {
                log_message('debug', 'Redirect ke kepsek dashboard');
                return redirect()->to('kepsek');
            }
        } else {
            log_message('debug', 'Bukan POST request, metode: ' . $method);
        }

        log_message('debug', 'Menampilkan halaman login');
        return view('auth/login');
    }

    public function register()
    {
        log_message('debug', 'Memasuki metode register');
        $method = $this->request->getMethod();
        log_message('debug', 'Request method: ' . $method);

        if (strtolower($method) === 'post') {
            log_message('debug', 'Menerima POST request untuk register');
            $rules = [
                'email' => 'required|valid_email|is_unique[users.email]',
                'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
                'password' => 'required|min_length[6]',
                'confirm_password' => 'required|matches[password]'
            ];

            if (!$this->validate($rules)) {
                $errors = $this->validator->getErrors();
                log_message('error', 'Validasi registrasi gagal: ' . json_encode($errors));
                session()->setFlashdata('validation', $errors);
                return redirect()->to('auth/register')->withInput();
            }

            $data = [
                'email' => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role' => 'siswa'
            ];

            if ($this->userModel->insert($data)) {
                $id_user = $this->userModel->insertID();
                log_message('info', 'Pengguna baru terdaftar: ' . $data['username'] . ', id_user: ' . $id_user);
                session()->set([
                    'id_user' => $id_user,
                    'username' => $data['username'],
                    'role' => 'siswa',
                    'logged_in' => true
                ]);
                return redirect()->to('siswa')->with('success', 'Registrasi berhasil! Silakan lengkapi data siswa.');
            } else {
                log_message('error', 'Gagal menyimpan pengguna baru: ' . $data['username']);
                session()->setFlashdata('error', 'Gagal melakukan registrasi.');
                return redirect()->to('auth/register');
            }
        }

        log_message('debug', 'Menampilkan halaman register');
        return view('auth/register');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login');
    }
}