<?php

namespace App\Models;

use CodeIgniter\Model;

class modelProduct extends Model
{
    protected $table = "table_product";
    protected $allowedFields = ['title', 'seller', 'description', 'available', 'star', 'price', 'imgLink', 'id_seller'];
}