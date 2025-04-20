<?php
namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KepalaSekolahModel;
use App\Models\OperatorModel;
use App\Models\UserModel;
use App\Models\WaliModel;

class Admin extends BaseController
{
    protected $siswaModel;
    protected $kepsekModel;
    protected $operatorModel;
    protected $userModel;
    protected $waliModel;

    public function __construct()
    {
        // Inisialisasi model
        $this->siswaModel = new SiswaModel();
        $this->kepsekModel = new KepalaSekolahModel();
        $this->operatorModel = new OperatorModel();
        $this->userModel = new UserModel();
        $this->waliModel = new WaliModel();

        // Tidak perlu $this->load->model atau $this->load->library
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $kepsek = $this->kepsekModel->like('username', $keyword)->findAll();
        } else {
            $kepsek = $this->kepsekModel->findAll();
        }
        
        $data = [
            'username' => session()->get('username'),
            'kepsek' => $kepsek, 
            'keyword' => $keyword,
        ];
        
        return view('admin/admin_kepsek', $data);
    }

    public function index2()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $operator = $this->operatorModel->like('username', $keyword)->findAll();
        } else {
            $operator = $this->operatorModel->findAll();
        }
        
        $data = [
            'username' => session()->get('username'),
            'operator' => $operator, 
            'keyword' => $keyword, 
        ];

        return view('admin/admin_operator', $data);
    }

    public function index3()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }
    
        $keyword = $this->request->getGet('keyword');
    
        if ($keyword) {
            $users = $this->userModel->where('role', 'siswa')->like('username', $keyword)->findAll();
        } else {
            $users = $this->userModel->where('role', 'siswa')->findAll();
        }
    
        // Ambil data siswa, wali, dan orang tua kandung untuk setiap user
        $userData = [];
        $orangTuaModel = new \App\Models\OrangTuaModel();
        foreach ($users as $user) {
            $siswa = $this->siswaModel->where('id_user', $user['id_user'])->first();
            $wali = null;
            $orangTua = null;
            if ($siswa) {
                $wali = $this->waliModel->where('id_siswa', $siswa['id_siswa'])->first();
                $orangTua = $orangTuaModel->where('id_siswa', $siswa['id_siswa'])->first();
            }
            $userData[] = [
                'user' => $user,
                'siswa' => $siswa,
                'wali' => $wali,
                'orang_tua' => $orangTua
            ];
        }
    
        $data = [
            'username' => session()->get('username'),
            'users' => $userData,
            'keyword' => $keyword,
        ];
        return view('admin/admin_siswa', $data);
    }

    public function add_siswa()
    {
        // Simpan data ke tabel users
        $userData = [
            'username' => $this->request->getPost('nama_lengkap'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => 'siswa'
        ];
        $id_user = $this->userModel->insert($userData, true);

        // Upload file
        $gambar = $this->uploadFile('gambar');
        $kk = $this->uploadFile('kk');
        $raport = $this->uploadFile('raport');
        $akta = $this->uploadFile('akta');
        $skl = $this->uploadFile('skl');

        // Simpan data ke tabel siswa
        $siswaData = [
            'id_user' => $id_user,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'nomor_induk' => $this->request->getPost('nomor_induk'),
            'nomor_induk_asal' => $this->request->getPost('nomor_induk_asal'),
            'nisn' => $this->request->getPost('nisn'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
            'anak_ke' => $this->request->getPost('anak_ke'),
            'status_anak' => $this->request->getPost('status_anak'),
            'alamat_siswa' => $this->request->getPost('alamat_siswa'),
            'telepon_siswa' => $this->request->getPost('telepon_siswa'),
            'nama_tk_asal' => $this->request->getPost('nama_tk_asal'),
            'alamat_tk_asal' => $this->request->getPost('alamat_tk_asal'),
            'status' => 'diproses',
            'gambar' => $gambar,
            'kk' => $kk,
            'raport' => $raport,
            'akta' => $akta,
            'skl' => $skl,
            'id_login' => $this->request->getPost('id_login')
        ];

        $id_siswa = $this->siswaModel->insert($siswaData, true);

        // Simpan data wali
        $waliData = [
            'id_siswa' => $id_siswa,
            'nama_ayah_wali' => $this->request->getPost('nama_ayah_wali'),
            'nama_ibu_wali' => $this->request->getPost('nama_ibu_wali'),
            'alamat_ayah_wali' => $this->request->getPost('alamat_ayah_wali'),
            'alamat_ibu_wali' => $this->request->getPost('alamat_ibu_wali'),
            'telepon_hp' => $this->request->getPost('telepon_hp'),
            'pekerjaan_ayah_wali' => $this->request->getPost('pekerjaan_ayah_wali'),
            'pekerjaan_ibu_wali' => $this->request->getPost('pekerjaan_ibu_wali'),
            'pendidikan_ayah_wali' => $this->request->getPost('pendidikan_ayah_wali'),
            'pendidikan_ibu_wali' => $this->request->getPost('pendidikan_ibu_wali'),
            'penghasilan_ayah_wali' => $this->request->getPost('penghasilan_ayah_wali'),
            'penghasilan_ibu_wali' => $this->request->getPost('penghasilan_ibu_wali')
        ];

        $this->waliModel->insert($waliData);

        return redirect()->to('/admin/siswa')->with('success', 'Siswa dan data wali berhasil ditambahkan');
    }

    public function update_siswa()
    {
        try {
            $id_user = $this->request->getPost('id_user');
            if (!$id_user) {
                throw new \Exception('ID User tidak ditemukan.');
            }
    
            // Update tabel users jika ada password baru
            $userData = [];
            if ($this->request->getPost('password')) {
                $userData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            }
            if (!empty($userData)) {
                $this->userModel->update($id_user, $userData);
            }
    
            // Cek apakah data siswa sudah ada
            $siswa = $this->siswaModel->where('id_user', $id_user)->first();
    
            // Upload file jika ada
            $gambar = $this->uploadFile('gambar');
            $kk = $this->uploadFile('kk');
            $raport = $this->uploadFile('raport');
            $akta = $this->uploadFile('akta');
            $skl = $this->uploadFile('skl');
    
            // Siapkan data siswa
            $siswaData = [
                'id_user' => $id_user,
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'nama_panggilan' => $this->request->getPost('nama_panggilan'),
                'nomor_induk' => $this->request->getPost('nomor_induk'),
                'nomor_induk_asal' => $this->request->getPost('nomor_induk_asal'),
                'nisn' => $this->request->getPost('nisn'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'agama' => $this->request->getPost('agama'),
                'anak_ke' => $this->request->getPost('anak_ke'),
                'status_anak' => $this->request->getPost('status_anak'),
                'alamat_siswa' => $this->request->getPost('alamat_siswa'),
                'telepon_siswa' => $this->request->getPost('telepon_siswa'),
                'nama_tk_asal' => $this->request->getPost('nama_tk_asal'),
                'alamat_tk_asal' => $this->request->getPost('alamat_tk_asal'),
                'status' => $this->request->getPost('status') ?: 'diproses',
            ];
    
            if ($gambar) $siswaData['gambar'] = $gambar;
            if ($kk) $siswaData['kk'] = $kk;
            if ($raport) $siswaData['raport'] = $raport;
            if ($akta) $siswaData['akta'] = $akta;
            if ($skl) $siswaData['skl'] = $skl;
    
            // Jika data siswa belum ada, lakukan insert
            if (!$siswa) {
                $id_siswa = $this->siswaModel->insert($siswaData, true);
                if (!$id_siswa) {
                    throw new \Exception('Gagal menyimpan data siswa.');
                }
            } else {
                // Jika sudah ada, lakukan update
                $this->siswaModel->update($siswa['id_siswa'], $siswaData);
                $id_siswa = $siswa['id_siswa'];
            }
    
            // Tentukan jenis orang tua yang diisi
            $parentType = $this->request->getPost('parent_type');
            $orangTuaModel = new \App\Models\OrangTuaModel();
    
            if ($parentType === 'wali') {
                // Simpan data wali
                $waliData = [
                    'id_siswa' => $id_siswa,
                    'nama_ayah_wali' => $this->request->getPost('wali')['nama_ayah_wali'] ?? '',
                    'nama_ibu_wali' => $this->request->getPost('wali')['nama_ibu_wali'] ?? '',
                    'alamat_ayah_wali' => $this->request->getPost('wali')['alamat_ayah_wali'] ?? '',
                    'alamat_ibu_wali' => $this->request->getPost('wali')['alamat_ibu_wali'] ?? '',
                    'telepon_hp' => $this->request->getPost('wali')['telepon_hp'] ?? '',
                    'pekerjaan_ayah_wali' => $this->request->getPost('wali')['pekerjaan_ayah_wali'] ?? '',
                    'pekerjaan_ibu_wali' => $this->request->getPost('wali')['pekerjaan_ibu_wali'] ?? '',
                    'pendidikan_ayah_wali' => $this->request->getPost('wali')['pendidikan_ayah_wali'] ?? '',
                    'pendidikan_ibu_wali' => $this->request->getPost('wali')['pendidikan_ibu_wali'] ?? '',
                    'penghasilan_ayah_wali' => $this->request->getPost('wali')['penghasilan_ayah_wali'] ?? '',
                    'penghasilan_ibu_wali' => $this->request->getPost('wali')['penghasilan_ibu_wali'] ?? ''
                ];
    
                // Cek apakah data wali sudah ada, jika ada update, jika tidak insert
                $existingWali = $this->waliModel->where('id_siswa', $id_siswa)->first();
                if ($existingWali && isset($existingWali['id'])) {
                    $this->waliModel->update($existingWali['id'], $waliData);
                } else {
                    $this->waliModel->insert($waliData);
                }
    
                // Hapus data orang tua kandung jika ada
                $existingOrangTua = $orangTuaModel->where('id_siswa', $id_siswa)->first();
                if ($existingOrangTua && isset($existingOrangTua['id'])) {
                    $orangTuaModel->delete($existingOrangTua['id']);
                }
            } else {
                // Simpan data orang tua kandung
                $orangTuaData = [
                    'id_siswa' => $id_siswa,
                    'nama_ayah' => $this->request->getPost('orang_tua')['nama_ayah'] ?? '',
                    'nama_ibu' => $this->request->getPost('orang_tua')['nama_ibu'] ?? '',
                    'alamat_ayah' => $this->request->getPost('orang_tua')['alamat_ayah'] ?? '',
                    'alamat_ibu' => $this->request->getPost('orang_tua')['alamat_ibu'] ?? '',
                    'telepon_hp' => $this->request->getPost('orang_tua')['telepon_hp'] ?? '',
                    'pekerjaan_ayah' => $this->request->getPost('orang_tua')['pekerjaan_ayah'] ?? '',
                    'pekerjaan_ibu' => $this->request->getPost('orang_tua')['pekerjaan_ibu'] ?? '',
                    'pendidikan_ayah' => $this->request->getPost('orang_tua')['pendidikan_ayah'] ?? '',
                    'pendidikan_ibu' => $this->request->getPost('orang_tua')['pendidikan_ibu'] ?? '',
                    'penghasilan_ayah' => $this->request->getPost('orang_tua')['penghasilan_ayah'] ?? '',
                    'penghasilan_ibu' => $this->request->getPost('orang_tua')['penghasilan_ibu'] ?? ''
                ];
    
                // Cek apakah data orang tua kandung sudah ada, jika ada update, jika tidak insert
                $existingOrangTua = $orangTuaModel->where('id_siswa', $id_siswa)->first();
                log_message('debug', 'Existing Orang Tua: ' . json_encode($existingOrangTua)); // Debugging
                if ($existingOrangTua && isset($existingOrangTua['id'])) {
                    $orangTuaModel->update($existingOrangTua['id'], $orangTuaData);
                } else {
                    $orangTuaModel->insert($orangTuaData);
                }
    
                // Hapus data wali jika ada
                $existingWali = $this->waliModel->where('id_siswa', $id_siswa)->first();
                if ($existingWali && isset($existingWali['id'])) {
                    $this->waliModel->delete($existingWali['id']);
                }
            }
    
            return redirect()->to('/admin/siswa')->with('success', 'Data siswa dan data orang tua berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->to('/admin/siswa')->with('error', 'Gagal memperbarui data siswa: ' . $e->getMessage());
        }
    }

    private function uploadFile($fieldName)
    {
        $file = $this->request->getFile($fieldName);
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            return 'uploads/' . $newName;
        }
        return null;
    }

    public function set_password_siswa($id)
    {
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $this->userModel->update($id, ['password' => $password]);
        return redirect()->to('/admin/siswa')->with('success', 'Password siswa berhasil diatur');
    }

    public function set_password_kepsek($id)
    {
        $password = $this->request->getPost('password'); // Tanpa hash
        $this->kepsekModel->update($id, ['password' => $password]);
        return redirect()->to('/admin')->with('success', 'Password kepsek berhasil diatur');
    }

    public function set_password_operator($id)
    {
        $password = $this->request->getPost('password'); // Tanpa hash
        $this->operatorModel->update($id, ['password' => $password]);
        return redirect()->to('/admin/operator')->with('success', 'Password operator berhasil diatur');
    }

    public function add_kepsek()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password') // Tanpa hash
        ];
        $this->kepsekModel->save($data);
        return redirect()->to('/admin')->with('success', 'Kepala sekolah berhasil ditambahkan');
    }

    public function add_operator()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password') // Tanpa hash
        ];
        $this->operatorModel->save($data);
        return redirect()->to('/admin/operator')->with('success', 'Operator berhasil ditambahkan');
    }

    public function delete_siswa($id)
    {
        $user = $this->userModel->find($id);
    
        if (!$user) {
            return redirect()->to('/admin/siswa')->with('error', 'User tidak ditemukan');
        }
    
        // Hapus data terkait siswa (jika ada) sebelum hapus user
        $siswa = $this->siswaModel->where('id_user', $id)->first();
        if ($siswa) {
            $db = \Config\Database::connect();
            $db->table('orang_tua')->where('id_siswa', $siswa['id_siswa'])->delete();
            $db->table('wali')->where('id_siswa', $siswa['id_siswa'])->delete();
            $this->siswaModel->delete($siswa['id_siswa']);
        }
    
        // Hapus user
        $this->userModel->delete($id);
    
        return redirect()->to('/admin/siswa')->with('success', 'User dan data terkait berhasil dihapus');
    }
    
    public function delete_kepsek($id)
    {
        $this->kepsekModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Data kepala sekolah berhasil dihapus');
    }

    public function delete_operator($id)
    {
        $this->operatorModel->delete($id);
        return redirect()->to('/admin/operator')->with('success', 'Data operator berhasil dihapus');
    }

    public function detailSiswa($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        // Ambil data siswa
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/admin/siswa')->with('error', 'Siswa tidak ditemukan');
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
            'username' => session()->get('username')
        ];
        return view('admin/admin_detail_siswa', $data);
    }

    public function add_user_only()
    {
        // Aturan validasi
        $validationRules = [
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah digunakan.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah digunakan.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, redirect kembali dengan pesan error
            return redirect()->to('/admin/siswa')->with('error', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => $this->request->getPost('role') // Default: siswa
        ];

        // Simpan ke database
        $this->userModel->insert($data);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/siswa')->with('success', 'Akun siswa berhasil ditambahkan!');
    }
}