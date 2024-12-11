<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table      = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'payment_status', 'payment_response'];
    protected $useTimestamps = true;

    public function createPayment($data)
    {
        return $this->insert($data);
    }

    public function getPayment($id)
    {
        return $this->find($id);
    }

    public function getPaymentsByOrder($order_id)
    {
        return $this->where('order_id', $order_id)->findAll();
    }
}
