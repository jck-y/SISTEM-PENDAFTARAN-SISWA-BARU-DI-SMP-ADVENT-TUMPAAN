<?php
namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KepalaSekolahModel;
use App\Models\OperatorModel;

class Admin extends BaseController
{
    protected $siswaModel;
    protected $kepsekModel;
    protected $operatorModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kepsekModel = new KepalaSekolahModel();
        $this->operatorModel = new OperatorModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $kepsek = $this->kepsekModel->like('nama', $keyword)->findAll();
        } else {
            $kepsek = $this->kepsekModel->findAll();
        }
        
        $data = [
            'nama' => session()->get('nama'),
            'kepsek' => $kepsek, 
            'keyword' => $keyword,
        ];
        
        return view('admin/admin_kepsek', $data);
    }

    public function set_password_siswa($id)
    {
        $password = $this->request->getPost('password'); // Tanpa hash
        $this->siswaModel->update($id, ['password' => $password]);
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
            'nama' => $this->request->getPost('nama'),
            'password' => $this->request->getPost('password') // Tanpa hash
        ];
        $this->kepsekModel->save($data);
        return redirect()->to('/admin')->with('success', 'Kepala sekolah berhasil ditambahkan');
    }

    public function add_operator()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'password' => $this->request->getPost('password') // Tanpa hash
        ];
        $this->operatorModel->save($data);
        return redirect()->to('/admin/operator')->with('success', 'Operator berhasil ditambahkan');
    }

    // public function delete_siswa($id)
    // {
    //     $this->siswaModel->delete($id);
    //     return redirect()->to('/admin/siswa')->with('success', 'Data siswa berhasil dihapus');
    // }
    public function delete_siswa($id)
    {
        $siswa = $this->siswaModel->find($id);
    
        if (!$siswa) {
            return redirect()->to('/admin/siswa')->with('error', 'Siswa tidak ditemukan');
        }
    
        // Hapus data orang tua dan wali sebelum hapus siswa
        $db = \Config\Database::connect();
        $db->table('orang_tua')->where('id_siswa', $id)->delete();
        $db->table('wali')->where('id_siswa', $id)->delete();
    
        // Hapus data siswa
        $this->siswaModel->delete($id);
    
        return redirect()->to('/admin/siswa')->with('success', 'Data siswa dan data terkait berhasil dihapus');
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

    public function index2()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $operator = $this->operatorModel->like('nama', $keyword)->findAll();
        } else {
            $operator = $this->operatorModel->findAll();
        }
        
        $data = [
            'nama' => session()->get('nama'),
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
            $siswa = $this->siswaModel->like('nama_lengkap', $keyword)->findAll();
        } else {
            $siswa = $this->siswaModel->findAll();
        }

        $data = [
            'nama' => session()->get('nama'),
            'siswa' => $siswa,
            // 'kepsek' => $this->kepsekModel->findAll(),
            // 'operator' => $this->operatorModel->findAll(),
            'keyword' => $keyword,
        ];
        return view('admin/admin_siswa', $data);
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

        // Ambil data orang tua dan wali (asumsi ada model dan tabel terpisah)
        $orangTuaModel = new \App\Models\OrangTuaModel(); // Sesuaikan nama model
        $waliModel = new \App\Models\WaliModel(); // Sesuaikan nama model   
        $orang_tua = $orangTuaModel->where('id_siswa', $id)->first();
        $wali = $waliModel->where('id_siswa', $id)->first();

        $data = [
            'siswa' => $siswa,
            'orang_tua' => $orang_tua,
            'wali' => $wali,
            'nama' => session()->get('nama')
        ];

        return view('admin/admin_detail_siswa', $data);
    }
}