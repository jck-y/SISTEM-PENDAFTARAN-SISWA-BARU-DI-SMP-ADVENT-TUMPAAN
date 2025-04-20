<?php
namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = [
        'id_user',
        'nama_lengkap',
        'nama_panggilan',
        'nomor_induk',
        'nomor_induk_asal',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'anak_ke',
        'status_anak',
        'alamat_siswa',
        'telepon_siswa',
        'nama_tk_asal',
        'alamat_tk_asal',
        'gambar',
        'kk',
        'raport',
        'akta',
        'skl',
        'status',
        'id_login'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}