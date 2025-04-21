<?php
namespace App\Models;

use CodeIgniter\Model;

class WaliModel extends Model
{
    protected $table = 'wali';
    protected $primaryKey = 'id_wali';
    protected $allowedFields = [
        'id_siswa', 'nama_ayah_wali', 'alamat_ayah_wali', 'pekerjaan_ayah_wali', 'pendidikan_ayah_wali', 'penghasilan_ayah_wali',
        'nama_ibu_wali', 'alamat_ibu_wali', 'pekerjaan_ibu_wali', 'pendidikan_ibu_wali', 'penghasilan_ibu_wali', 'telepon_hp'
    ];
}