<?php

namespace App\Models;

use CodeIgniter\Model;

class modelAccount extends Model
{
    protected $table = "table_account";
    protected $allowedFields = ['username', 'password', 'type'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
