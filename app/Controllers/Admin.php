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
<<<<<<< HEAD
        $data['role'] = session()->get('role');
        $data['nama'] = session()->get('nama');
        return view('admin/admin', $data);
=======
        
        $data = [
            'nama' => session()->get('nama'),
            'siswa' => $this->siswaModel->findAll(),
            'kepsek' => $this->kepsekModel->findAll(),
            'operator' => $this->operatorModel->findAll()
        ];
        
        return view('admin/index', $data);
>>>>>>> 1306cf0fc4e19b18791b748090733b60b177e80a
    }

    public function set_password_siswa($id)
    {
        $password = $this->request->getPost('password'); // Tanpa hash
        $this->siswaModel->update($id, ['password' => $password]);
        return redirect()->to('/admin')->with('success', 'Password siswa berhasil diatur');
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
        return redirect()->to('/admin')->with('success', 'Password operator berhasil diatur');
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
        return redirect()->to('/admin')->with('success', 'Operator berhasil ditambahkan');
    }

    public function delete_siswa($id)
    {
        $this->siswaModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Data siswa berhasil dihapus');
    }

    public function delete_kepsek($id)
    {
        $this->kepsekModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Data kepala sekolah berhasil dihapus');
    }

    public function delete_operator($id)
    {
        $this->operatorModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Data operator berhasil dihapus');
    }
}