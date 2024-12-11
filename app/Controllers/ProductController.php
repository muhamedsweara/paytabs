<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->getProducts();

        return view('products/index', ['products' => $products]);
    }
}
