<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Pastikan nama tabel adalah 'users'
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['email', 'username', 'password', 'role'];
    protected $useTimestamps = true; // Aktifkan timestamp
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $returnType = 'array';
    
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }
}