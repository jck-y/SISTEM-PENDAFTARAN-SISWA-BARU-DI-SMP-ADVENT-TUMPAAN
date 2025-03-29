<?php
namespace App\Models;

use CodeIgniter\Model;

class OrangTuaModel extends Model
{
    protected $table = 'orang_tua';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_siswa', 'nama_ayah', 'alamat_ayah', 'pekerjaan_ayah', 'pendidikan_ayah', 'penghasilan_ayah',
        'nama_ibu', 'alamat_ibu', 'pekerjaan_ibu', 'pendidikan_ibu', 'penghasilan_ibu', 'telepon_hp'
    ];
}