<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class ShopController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        try {
            $data['product'] = $this->productModel->findAll();
            return view('user/shop', $data);
        } catch (\Exception $e) {
            // Handle the exception
        }
    }
}
