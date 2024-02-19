<?php

namespace App\Controllers;
use CodeIgniter\Controller;



class AboutUsController extends BaseController 
{
    public function index()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/');
        }


        return view('user/about');
    }
  
}


