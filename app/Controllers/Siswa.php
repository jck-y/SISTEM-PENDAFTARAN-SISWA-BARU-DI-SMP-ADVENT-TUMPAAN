<?php

namespace App\Controllers;

use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        return view('siswa');
    }

    public function orangtua_kandung()
    {
        return view('orangtua_kandung');
    }

    public function orangtua_wali()
    {
        return view('orangtua_wali');
    }

    public function uploadimg()
    {
        return view('uploadimg');
    }

    public function save_siswa()
    {
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'nomor_induk' => $this->request->getPost('nomor_induk_asal'),
            'nisn' => $this->request->getPost('nisn'),
            'tempat_lahir' => $this->request->getPost('tempat_tanggal_lahir'), // Perlu dipisah jika ingin terpisah
            'tanggal_lahir' => date('Y-m-d', strtotime($this->request->getPost('tempat_tanggal_lahir'))),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
            'anak_ke' => $this->request->getPost('anak_ke'),
            'status_anak' => $this->request->getPost('status'),
            'alamat_siswa' => $this->request->getPost('alamat_siswa'),
            'telepon_siswa' => $this->request->getPost('telepon'),
            'nama_tk_asal' => $this->request->getPost('nama_tk_asal'),
            'alamat_tk_asal' => $this->request->getPost('alamat_sekolah'),
            'status' => 'Diproses' // Default status
        ];

        if ($this->siswaModel->saveSiswa($data)) {
            $id_siswa = $this->siswaModel->getLastSiswaId();
            session()->set('id_siswa', $id_siswa);

            // Mengecek tombol yang diklik
            $redirectTo = $this->request->getPost('redirect_to');
            
            if ($redirectTo == 'orangtua_kandung') {
                return redirect()->to('/siswa/orangtua_kandung');
            } elseif ($redirectTo == 'orangtua_wali') {
                return redirect()->to('/siswa/orangtua_wali');
            } else {
                // Default, redirect ke halaman lain jika tidak ada yang dipilih
                return redirect()->to('/siswa');
            }
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data siswa');
        }
    }


    public function save_orangtua_kandung()
    {
        $id_siswa = session()->get('id_siswa');
        $data = [
            'id_siswa' => $id_siswa,
            'nama_ayah' => $this->request->getPost('nama_lengkap_ayah'),
            'nama_ibu' => $this->request->getPost('nama_lengkap_ibu'),
            'alamat_ayah' => $this->request->getPost('alamat_ayah'),
            'alamat_ibu' => $this->request->getPost('alamat_ibu'),
            'telepon_hp' => $this->request->getPost('telepon'),
            'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
            'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
            'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
            'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
            'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu')
        ];

        if ($this->siswaModel->saveOrangTua($data)) {
            return redirect()->to('/siswa/uploadimg');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data orang tua');
        }
    }

    public function save_orangtua_wali()
    {
        $id_siswa = session()->get('id_siswa');
        $data = [
            'id_siswa' => $id_siswa,
            'nama_ayah_wali' => $this->request->getPost('nama_ayah_wali'),
            'nama_ibu_wali' => $this->request->getPost('nama_ibu_wali'),
            'alamat_ayah_wali' => $this->request->getPost('alamat_ayah_wali'),
            'alamat_ibu_wali' => $this->request->getPost('alamat_ibu_wali'),
            'telepon_hp' => $this->request->getPost('telepon'),
            'pekerjaan_ayah_wali' => $this->request->getPost('pekerjaan_ayah_wali'),
            'pekerjaan_ibu_wali' => $this->request->getPost('pekerjaan_ibu_wali'),
            'pendidikan_ayah_wali' => $this->request->getPost('pendidikan_ayah_wali'),
            'pendidikan_ibu_wali' => $this->request->getPost('pendidikan_ibu_wali'),
            'penghasilan_ayah_wali' => $this->request->getPost('penghasilan_ayah_wali'),
            'penghasilan_ibu_wali' => $this->request->getPost('penghasilan_ibu_wali')
        ];

        if ($this->siswaModel->saveWali($data)) {
            return redirect()->to('/siswa/uploadimg');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data wali');
        }
    }

    public function upload()
    {
        $id_siswa = session()->get('id_siswa');
        $file = $this->request->getFile('gambar');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);

            $data = [
                'gambar' => $newName
            ];

            $this->siswaModel->update($id_siswa, $data);
            return redirect()->to('/siswa')->with('success', 'Pendaftaran selesai!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengunggah gambar');
        }
    }
}