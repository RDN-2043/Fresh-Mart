<?php

namespace App\Models;

use CodeIgniter\Model;

class modelShipped extends Model
{
    protected $table = "table_shipped";
    protected $allowedFields = ['id_cart', 'delivered'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
