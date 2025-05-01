<?php
namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\OrangTuaModel;
use App\Models\WaliModel;

class Siswa extends BaseController
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
        $id_user = session()->get('id_user');
        $siswa = $this->siswaModel->where('id_user', $id_user)->first();

        if ($siswa) {
            // Cek semua dokumen
            if (empty($siswa['gambar']) || empty($siswa['kk']) || empty($siswa['raport']) || 
                empty($siswa['akta']) || empty($siswa['skl'])) {
                return redirect()->to('/siswa/uploadimg')->with('error', 'Silakan unggah semua dokumen.');
            }

            // Jika semua lengkap, ke dashboard
            return redirect()->to('/home/index');
        }

        // Jika belum ada data siswa, tampilkan form
        return view('siswa/index');
    }

    public function save_siswa()
    {
        $rules = [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'nomor_induk_asal' => 'required',
            'nisn' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|valid_date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'anak_ke' => 'required|numeric',
            'status_anak' => 'required',
            'alamat_siswa' => 'required',
            'telepon_siswa' => 'required',
            'nama_tk_asal' => 'required',
            'alamat_tk_asal' => 'required'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->to('/siswa')->withInput();
        }

        // Validasi tanggal lahir minimal 2013
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $min_date = new \DateTime('2013-01-01');
        $selected_date = new \DateTime($tanggal_lahir);
        $today = new \DateTime();

        if ($selected_date < $min_date) {
            session()->setFlashdata('validation', ['tanggal_lahir' => 'Tanggal lahir minimal harus pada tahun 2013.']);
            return redirect()->to('/siswa')->withInput();
        }

        if ($selected_date > $today) {
            session()->setFlashdata('validation', ['tanggal_lahir' => 'Tanggal lahir tidak boleh melebihi tanggal saat ini.']);
            return redirect()->to('/siswa')->withInput();
        }

        $data = [
            'id_user' => session()->get('id_user'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nama_panggilan' => $this->request->getPost('nama_panggilan'),
            'nomor_induk_asal' => $this->request->getPost('nomor_induk_asal'),
            'nisn' => $this->request->getPost('nisn'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
            'anak_ke' => $this->request->getPost('anak_ke'),
            'status_anak' => $this->request->getPost('status_anak'),
            'alamat_siswa' => $this->request->getPost('alamat_siswa'),
            'telepon_siswa' => $this->request->getPost('telepon_siswa'),
            'nama_tk_asal' => $this->request->getPost('nama_tk_asal'),
            'alamat_tk_asal' => $this->request->getPost('alamat_tk_asal'),
            'status' => 'diproses'
        ];

        $this->siswaModel->insert($data);
        $id_siswa = $this->siswaModel->insertID();
        session()->set('id_siswa', $id_siswa);
        log_message('debug', 'Data siswa disimpan dengan status: diproses untuk id_user: ' . session()->get('id_user'));

        // Ambil nilai redirect_to dari form
        $redirectTo = $this->request->getPost('redirect_to');

        // Redirect berdasarkan pilihan pengguna
        if ($redirectTo === 'orangtua_kandung') {
            return redirect()->to('/siswa/orangtua_kandung');
        } elseif ($redirectTo === 'orangtua_wali') {
            return redirect()->to('/siswa/orangtua_wali');
        } else {
            return redirect()->to('/siswa')->with('error', 'Pilihan tidak valid');
        }
    }

    public function orangtua_kandung()
    {
        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        return view('orangtua/orangtua_kandung', ['siswa' => $siswa]);
    }

    public function save_orangtua_kandung()
    {
        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        $rules = [
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_ayah' => 'required',
            'alamat_ibu' => 'required',
            'telepon_hp' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'pendidikan_ayah' => 'required',
            'pendidikan_ibu' => 'required',
            'penghasilan_ayah' => 'required|in_list[0-2.500.000,2.500.000-5.000.000,lebih dari 5.000.000]',
            'penghasilan_ibu' => 'required|in_list[0-2.500.000,2.500.000-5.000.000,lebih dari 5.000.000]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->to('/siswa/orangtua_kandung')->withInput();
        }

        $data = [
            'id_siswa' => $siswa['id_siswa'],
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'alamat_ayah' => $this->request->getPost('alamat_ayah'),
            'alamat_ibu' => $this->request->getPost('alamat_ibu'),
            'telepon_hp' => $this->request->getPost('telepon_hp'),
            'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
            'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
            'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
            'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
            'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu')
        ];

        $this->orangTuaModel->insert($data);
        return redirect()->to('/siswa/uploadimg');
    }

    public function orangtua_wali()
    {
        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        return view('orangtua/orangtua_wali', ['siswa' => $siswa]);
    }

    public function save_orangtua_wali()
    {
        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        $rules = [
            'nama_ayah_wali' => 'required',
            'nama_ibu_wali' => 'required',
            'alamat_ayah_wali' => 'required',
            'alamat_ibu_wali' => 'required',
            'telepon_hp' => 'required',
            'pekerjaan_ayah_wali' => 'required',
            'pekerjaan_ibu_wali' => 'required',
            'pendidikan_ayah_wali' => 'required',
            'pendidikan_ibu_wali' => 'required',
            'penghasilan_ayah_wali' => 'required|in_list[0-2.500.000,2.500.000-5.000.000,lebih dari 5.000.000]',
            'penghasilan_ibu_wali' => 'required|in_list[0-2.500.000,2.500.000-5.000.000,lebih dari 5.000.000]'
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('validation', $this->validator->getErrors());
            return redirect()->to('/siswa/orangtua_wali')->withInput();
        }

        $data = [
            'id_siswa' => $siswa['id_siswa'],
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

        $this->waliModel->insert($data);
        return redirect()->to('/siswa/uploadimg');
    }

    public function uploadimg()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        $orangTua = $this->orangTuaModel->where('id_siswa', $siswa['id_siswa'])->first();
        $wali = $this->waliModel->where('id_siswa', $siswa['id_siswa'])->first();

        if (!$orangTua && !$wali) {
            return redirect()->to('/siswa')->with('error', 'Silakan isi data orang tua atau wali terlebih dahulu.');
        }

        return view('orangtua/uploadimg', ['siswa' => $siswa]);
    }

    public function upload()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth');
        }

        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            log_message('error', 'Data siswa tidak ditemukan untuk id_user: ' . session()->get('id_user'));
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }
    
        log_message('debug', 'Memulai proses upload untuk id_siswa: ' . $siswa['id_siswa']);
        $rules = [
            'gambar' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
            'kk' => 'uploaded[kk]|ext_in[kk,jpg,jpeg,png,pdf]|max_size[kk,2048]',
            'raport' => 'uploaded[raport]|ext_in[raport,jpg,jpeg,png,pdf]|max_size[raport,2048]',
            'akta' => 'uploaded[akta]|ext_in[akta,jpg,jpeg,png,pdf]|max_size[akta,2048]',
            'skl' => 'uploaded[skl]|ext_in[skl,jpg,jpeg,png,pdf]|max_size[skl,2048]'
        ];
    
        if (!$this->validate($rules)) {
            $errors = $this->validator->getErrors();
            log_message('error', 'Validasi upload gagal: ' . json_encode($errors));
            session()->setFlashdata('validation', $errors);
            return redirect()->to('/siswa/uploadimg')->withInput();
        }
    
        $documents = ['gambar', 'kk', 'raport', 'akta', 'skl'];
        $updateData = [];
    
        foreach ($documents as $doc) {
            $file = $this->request->getFile($doc);
            if ($file->isValid()) {
                $fileName = $file->getRandomName();
                $destination = FCPATH . 'uploads';
                $fullPath = $destination . '/' . $fileName;
                log_message('debug', 'Mencoba menyimpan file ' . $doc . ' ke: ' . $fullPath);
                
                if ($file->move($destination, $fileName)) {
                    $updateData[$doc] = 'uploads/' . $fileName;
                    log_message('debug', 'File berhasil disimpan: ' . $updateData[$doc] . ' untuk ' . $doc);
                } else {
                    log_message('error', 'Gagal menyimpan file: ' . $file->getName() . ' untuk ' . $doc . '. Error: ' . $file->getErrorString());
                }
            } else {
                log_message('error', 'File tidak valid untuk: ' . $doc . '. Error: ' . $file->getErrorString());
            }
        }
    
        if (!empty($updateData)) {
            if ($this->siswaModel->update($siswa['id_siswa'], $updateData)) {
                log_message('debug', 'Data dokumen diperbarui: ' . json_encode($updateData));
            } else {
                log_message('error', 'Gagal memperbarui data dokumen untuk id_siswa: ' . $siswa['id_siswa']);
                session()->setFlashdata('error', 'Gagal menyimpan dokumen ke database.');
                return redirect()->to('/siswa/uploadimg');
            }
        } else {
            log_message('error', 'Tidak ada dokumen yang diperbarui untuk id_siswa: ' . $siswa['id_siswa']);
            session()->setFlashdata('error', 'Gagal mengunggah dokumen. Silakan coba lagi.');
            return redirect()->to('/siswa/uploadimg');
        }
    
        log_message('debug', 'Upload selesai, redirect ke /siswa/done');
        return redirect()->to('/siswa/done');
    }

    public function done()
    {
        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        return view('siswa/done', ['siswa' => $siswa]);
    }

    public function detail($id)
    {
        $siswa = $this->siswaModel->find($id);
        if (!$siswa) {
            return redirect()->to('/home/index')->with('error', 'Data siswa tidak ditemukan.');
        }

        $orangTua = $this->orangTuaModel->where('id_siswa', $id)->first();
        $wali = $this->waliModel->where('id_siswa', $id)->first();
        return view('detail_siswa', [
            'siswa' => $siswa,
            'orangTua' => $orangTua,
            'wali' => $wali
        ]);
    }

    public function dashboard()
    {
        $siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first();
        if (!$siswa) {
            return redirect()->to('/siswa')->with('error', 'Isi data siswa terlebih dahulu.');
        }

        $orangTua = $this->orangTuaModel->where('id_siswa', $siswa['id_siswa'])->first();
        $wali = $this->waliModel->where('id_siswa', $siswa['id_siswa'])->first();
        return view('home/index', [
            'siswa' => $siswa,
            'orangTua' => $orangTua,
            'wali' => $wali
        ]);
    }
}