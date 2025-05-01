<?php
namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\OrangTuaModel;
use App\Models\WaliModel;

class Home extends BaseController
{
    protected $siswaModel;
    protected $orangTuaModel;
    protected $waliModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->orangTuaModel = new OrangTuaModel();
        $this->waliModel = new WaliModel();
    }

    public function index()
    {
        log_message('debug', 'Memasuki Home::index');
        if (!session()->get('logged_in') || session()->get('role') !== 'siswa') {
            log_message('debug', 'Sesi tidak valid atau bukan siswa, redirect ke auth/login');
            return redirect()->to('auth/login');
        }

        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        log_message('debug', 'Data siswa: ' . json_encode($siswa));

        if (!$siswa) {
            log_message('debug', 'Data siswa tidak ditemukan, redirect ke /siswa');
            return redirect()->to('siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        $orangTua = $this->orangTuaModel->where('id_siswa', $siswa['id_siswa'])->first();
        log_message('debug', 'Data orang tua: ' . json_encode($orangTua));

        $wali = $this->waliModel->where('id_siswa', $siswa['id_siswa'])->first();
        log_message('debug', 'Data wali: ' . json_encode($wali));

        // Jika belum ada data orang tua maupun wali, arahkan ke form siswa
        if (!$orangTua && !$wali) {
            log_message('debug', 'Data orang tua dan wali tidak ditemukan, redirect ke /siswa');
            return redirect()->to('siswa')->with('error', 'Silakan isi data orang tua atau wali terlebih dahulu.');
        }

        $documents = ['gambar', 'kk', 'raport', 'akta', 'skl'];
        $missingDocs = [];
        foreach ($documents as $doc) {
            if (empty($siswa[$doc]) || trim($siswa[$doc]) === '') {
                $missingDocs[] = $doc;
            }
        }
        if (!empty($missingDocs)) {
            log_message('error', 'Dokumen tidak lengkap: ' . implode(', ', $missingDocs) . ', redirect ke /siswa/uploadimg');
            return redirect()->to('siswa/uploadimg')->with('error', 'Silakan unggah semua dokumen: ' . implode(', ', $missingDocs));
        }

        log_message('debug', 'Semua data lengkap, menampilkan home/index dengan status: ' . ($siswa['status'] ?? 'pending'));
        $data = [
            'nama_lengkap' => $siswa['nama_lengkap'],
            'status' => $siswa['status'] ?? 'pending',
            'siswa' => $siswa,
            'orangTua' => $orangTua,
            'wali' => $wali
        ];

        return view('home/index', $data);
    }
}