<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class TennisController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->getProducts();
    
      
            return view('user/tennis', $data);
    }
    public function search()
    {
        $searchKeyword = $this->request->getPost('search_keyword');
        $productModel = new ProductModel();
        $data['product'] = $productModel->searchProducts($searchKeyword);

        return view('user/tennis', $data);
    }
}
