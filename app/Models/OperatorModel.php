<?php
namespace App\Models;

use CodeIgniter\Model;

class OperatorModel extends Model
{
    protected $table = 'operator';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'operator'];
}