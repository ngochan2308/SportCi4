<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CategoryModel;


class UserController extends BaseController 
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }

        // Assuming you have a model that fetches categories from the database
        $categoriesModel = new CategoryModel();
        $categories = $categoriesModel->getCategories();

        // Pass the categories data to the view
        $data['categories'] = $categories;

        // Load the view with the data
        return view('user/index', $data);
    }
  
}


