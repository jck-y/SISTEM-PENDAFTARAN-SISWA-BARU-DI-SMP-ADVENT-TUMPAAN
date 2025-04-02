<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nama_lengkap', 'nama_panggilan', 'nomor_induk', 'nisn', 'tempat_lahir', 
        'tanggal_lahir', 'jenis_kelamin', 'agama', 'anak_ke', 'status_anak', 
        'alamat_siswa', 'telepon_siswa', 'nama_tk_asal', 'alamat_tk_asal', 
        'status', 'password', 'gambar'
    ];

    protected $tableOrangTua = 'orang_tua';
    protected $tableWali = 'wali';

    public function saveSiswa($data)
    {
        return $this->insert($data);
    }

    public function saveOrangTua($data)
    {
        return $this->db->table($this->tableOrangTua)->insert($data);
    }

    public function saveWali($data)
    {
        return $this->db->table($this->tableWali)->insert($data);
    }

    public function getLastSiswaId()
    {
        return $this->db->insertID();
    }
}