<?php
namespace App\Models;

use CodeIgniter\Model;

class KepalaSekolahModel extends Model
{
    protected $table = 'kepala_sekolah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password']; 
    protected $returnType = 'array';
    protected $useTimestamps = false;
}