<?php
namespace App\Controllers;
use App\Models\SiswaModel;

class Kepsek extends BaseController
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

        $search = $this->request->getGet('search');

        $siswaQuery = $this->siswaModel;

        if ($search) {
            $siswaQuery->like('nama_lengkap', $search);
        }
        $siswa = $siswaQuery->findAll();

        usort($siswa, function ($a, $b) {
            $statusOrder = ['Diproses' => 1, 'Ditolak' => 2, 'Diterima' => 3];
            $statusA = $statusOrder[$a['status']] ?? 4;
            $statusB = $statusOrder[$b['status']] ?? 4;
            return $statusA <=> $statusB;
        });

        $data = [
            'role' => session()->get('role'),
            'nama' => session()->get('nama'),
            'siswa' => $siswa,
            'search' => $search
        ];

        return view('kepsek/kepsek', $data);
    }

    public function detailSiswa($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/Kepsek')->with('error', 'Siswa tidak ditemukan');
        }

        $orangTuaModel = new \App\Models\OrangTuaModel();
        $waliModel = new \App\Models\WaliModel();
        $orang_tua = $orangTuaModel->where('id_siswa', $id)->first();
        $wali = $waliModel->where('id_siswa', $id)->first();
        $documents = ['gambar', 'kk', 'akta', 'raport', 'skl'];
        $documentPaths = [];
        foreach ($documents as $doc) {
            if (!empty($siswa[$doc]) && file_exists(FCPATH . $siswa[$doc])) {
                $documentPaths[$doc] = base_url($siswa[$doc]);
            } else {
                $documentPaths[$doc] = null; 
            }
        }

        $data = [
            'siswa' => $siswa,
            'orang_tua' => $orang_tua,
            'wali' => $wali,
            'documents' => $documentPaths,
            'nama' => session()->get('nama'),
            'role' => 'kepsek'
        ];

        return view('detail_siswa/detail_siswa', $data);
    }
}