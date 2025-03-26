<?php
namespace App\Controllers;
use App\Models\SiswaModel;

class Operator extends BaseController
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

        $data = [
            'nama' => session()->get('nama'),
            'role' => session()->get('role'),
            'siswa' => $this->siswaModel->findAll() // Mengambil semua data siswa
        ];

        return view('operator/operator', $data);
    }

    public function update_status()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $id_siswa = $this->request->getPost('id_siswa');
        $status = $this->request->getPost('status');

        $data = [
            'status' => $status
        ];

        if ($this->siswaModel->update($id_siswa, $data)) {
            return redirect()->to('/operator')->with('success', 'Status siswa berhasil diperbarui');
        } else {
            return redirect()->to('/operator')->with('error', 'Gagal memperbarui status siswa');
        }
    }
}