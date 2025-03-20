<?php

namespace App\Models;

use CodeIgniter\Model;

class KepalaSekolahModel extends Model
{
    protected $table = 'kepala_sekolah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'password'];

    public function getKepalaSekolahByNama($nama)
    {
        return $this->where('nama', $nama)->first();
    }
}
