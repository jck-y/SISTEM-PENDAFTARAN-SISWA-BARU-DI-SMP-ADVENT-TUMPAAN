<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'password'];

    public function getAdminByNama($nama)
    {
        return $this->where('nama', $nama)->first();
    }
}
