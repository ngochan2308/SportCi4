<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class BadController extends Controller
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
    
        // Định dạng giá sản phẩm bằng number_format
   
            return view('user/badminton', $data);
    
    }

    public function search()
    {
        $searchKeyword = $this->request->getPost('search_keyword');
        $productModel = new ProductModel();
        $data['product'] = $productModel->searchProducts($searchKeyword);
        return view('user/badminton', $data);
    }
}
