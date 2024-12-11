<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'price', 'description'];
    protected $useTimestamps = false;

    public function getProducts()
    {
        return $this->findAll();
    }

    public function getProduct($id)
    {
        return $this->find($id);
    }
}
