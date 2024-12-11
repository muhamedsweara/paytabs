<?php

// OrderController.php
namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;

class OrderController extends BaseController
{
    public function index()
{
    $orderModel = new \App\Models\OrderModel();
    $orders = $orderModel->findAll(); // Fetch orders including payloads
    return view('orders/index', ['orders' => $orders]);
}


    // In OrderController.php
public function create()
{
    $productModel = new ProductModel();
    $products = $productModel->getProducts(); // Fetch available products

    return view('orders/create', ['products' => $products]);
}


    public function store()
    {
        $orderModel = new OrderModel();
        $orderData = [
            'user_email' => $this->request->getPost('email'),
            'status' => 'pending',
        ];
        $orderModel->createOrder($orderData);

        return redirect()->to('/checkout');
    }
    
}

