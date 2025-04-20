<?php
namespace App\Models;

use CodeIgniter\Model;

class OperatorModel extends Model
{
    protected $table = 'operator';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password']; 
    protected $returnType = 'array';
    protected $useTimestamps = false;
}