<?php

namespace App\Models;

use CodeIgniter\Model;

class modelCart extends Model
{
    protected $table = "table_cart";
    protected $allowedFields = ['id_product', 'id_customer', 'total'];
}
