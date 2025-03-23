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
        $data = [
            'nama' => session()->get('nama_lengkap') ?? '',
            'error' => session()->getFlashdata('error')
        ];
        return view('siswa/index', $data);
    }

    public function orangtua_kandung()
    {
        if (!session()->has('id_siswa')) {
            return redirect()->to('/siswa')->with('error', 'Pendaftaran siswa harus dilakukan terlebih dahulu');
        }
        
        $data = [
            'id_siswa' => session()->get('id_siswa')
        ];
        return view('orangtua/orangtua_kandung', $data);
    }

    public function orangtua_wali()
    {
        if (!session()->has('id_siswa')) {
            return redirect()->to('/siswa')->with('error', 'Pendaftaran siswa harus dilakukan terlebih dahulu');
        }
        
        $data = [
            'id_siswa' => session()->get('id_siswa')
        ];
        return view('orangtua/orangtua_wali', $data);
    }

    public function uploadimg()
    {
        if (!session()->has('id_siswa')) {
            return redirect()->to('/siswa')->with('error', 'Pendaftaran siswa harus dilakukan terlebih dahulu');
        }
        
        $data = [
            'id_siswa' => session()->get('id_siswa')
        ];
        return view('orangtua/uploadimg', $data);
    }

    public function save_siswa()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nomor_induk_asal' => 'required|is_unique[siswa.nomor_induk]',
            'nisn' => 'required|is_unique[siswa.nisn]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'anak_ke' => 'required|numeric',
            'alamat_siswa' => 'required',
            'nama_sekolah' => 'required',
            'nama_tk_asal' => 'required',
            'telepon' => 'required',
            'alamat_sekolah' => 'required'
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'nomor_induk' => $this->request->getPost('nomor_induk_asal'),
            'nisn' => $this->request->getPost('nisn'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
            'anak_ke' => $this->request->getPost('anak_ke'),
            'alamat_siswa' => $this->request->getPost('alamat_siswa'),
            'telepon_siswa' => $this->request->getPost('telepon'),
            'nama_tk_asal' => $this->request->getPost('nama_tk_asal'),
            'alamat_tk_asal' => $this->request->getPost('alamat_sekolah'),
            'status' => 'Diproses'
        ];
        // $data = $this->request->getPost();
        // var_dump($data); // Debug data yang dikirim dari form
        // die(); // Hentikan eksekusi untuk melihat output
    
        if ($this->siswaModel->saveSiswa($data)) {
            $id_siswa = $this->siswaModel->insertID();
            session()->set('id_siswa', $id_siswa);
    
            $redirectTo = $this->request->getPost('redirect_to');
            return redirect()->to($redirectTo === 'orangt' ? 
                '/siswa/orangtua_kandung' : 
                '/siswa/orangtua_wali');
        }
        
        return redirect()->back()->with('error', 'Gagal menyimpan data siswa');
    }

    public function save_orangtua_kandung()
    {
        if (!session()->has('id_siswa')) {
            return redirect()->to('/siswa')->with('error', 'Pendaftaran siswa harus dilakukan terlebih dahulu');
        }

        $data = [
            'id_siswa' => session()->get('id_siswa'),
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
        }
        
        return redirect()->back()->with('error', 'Gagal menyimpan data orang tua');
    }

    public function save_orangtua_wali()
    {
        if (!session()->has('id_siswa')) {
            return redirect()->to('/siswa')->with('error', 'Pendaftaran siswa harus dilakukan terlebih dahulu');
        }

        $data = [
            'id_siswa' => session()->get('id_siswa'),
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
        }
        
        return redirect()->back()->with('error', 'Gagal menyimpan data wali');
    }

    public function upload()
    {
        if (!session()->has('id_siswa')) {
            return redirect()->to('/siswa')->with('error', 'Pendaftaran siswa harus dilakukan terlebih dahulu');
        }

        $file = $this->request->getFile('gambar');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);

            $data = [
                'gambar' => $newName
            ];

            $id_siswa = session()->get('id_siswa');
            if ($this->siswaModel->update($id_siswa, $data)) {
                session()->remove('id_siswa'); // Bersihkan session setelah selesai
                return redirect()->to('/siswa/done');
            }
        }
        
        return redirect()->back()->with('error', 'Gagal mengunggah gambar');
    }

    public function done()
    {
        return view('siswa/done');
    }
}