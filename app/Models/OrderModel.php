<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_email', 'status'];
    protected $useTimestamps = true;

    public function getOrders()
    {
        return $this->findAll();
    }

    public function createOrder($data)
    {
        return $this->insert($data);
    }

    public function getOrder($id)
    {
        return $this->find($id);
    }
}
