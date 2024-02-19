<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ProfileUserModel;

class AdminContainer extends Controller
{
    public function index()
    {
             // Sử dụng các Model để lấy số lượng
             $productModel = new ProductModel();
             $categoryModel = new CategoryModel();
             $userModel = new UserModel();
     
             $productCount = $productModel->countAll(); // Đây là hàm có sẵn trong Model
             $categoryCount = $categoryModel->countAll();
             $userCount = $userModel->countAll();
     

    

        // Load view và truyền dữ liệu
        return view('admin/layout/container', ['productCount' => $productCount,
        'categoryCount' => $categoryCount,
        'userCount' => $userCount,]);
    }
}
