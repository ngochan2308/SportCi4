<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Session\Session; 
use App\Models\DangNhapModel;
use App\Helpers\AuthHelper; 

// AdminController.php




class AdminController extends Controller 
{
    public function index()
    {
        // Load helper AuthHelper
        helper(['AuthHelper']);

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!AuthHelper::isLoggedIn()) {
            return redirect()->to('/');
        }

        return view('admin/index');
    }
  

    //đăng ký
    public function register()
    {
        return view ('admin/auth/register');
    }

    public function processRegistration()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'email' => $this->request->getPost('email'),
            'Fullname' => $this->request->getPost('fullname'),
            'Address' => $this->request->getPost('address'),
            'Gender' => $this->request->getPost('gender'),
            'Birthday' => $this->request->getPost('birthday'),
            'Phone' => $this->request->getPost('phone'),
            'MaTaiKhoan' => 2, // Giả sử vai trò mặc định cho người dùng đã đăng ký
        ];
    
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[taikhoan.username]',
            'password' => 'required|min_length[6]',
            'email' => 'required|valid_email|is_unique[taikhoan.email]'
        ]);

    
        if ($validation->withRequest($this->request)->run()) {
            // Kiểm tra lỗi khi thực hiện insert
            $userModel = new DangNhapModel();
            if (!$userModel->insert($data)) {
                die('Error inserting data: ' . $userModel->errors());
            }
            session()->setFlashdata('success', 'Đăng ký thành công! Đăng nhập để tiếp tục.');

            return redirect()->to('/');
        } else {
       
            return view('admin/auth/register', ['validation' => $validation]);
        }
    }
    
    public function login()
    {
        helper('session');
        helper(['form']); // Load helper Form
         // Kiểm tra xem có thông báo lỗi từ quá trình đăng nhập trước không
    $loginError = session()->getFlashdata('login_error');
    return view('admin/auth/login', ['loginError' => $loginError]);
    }

    public function processLogin()
    {
        helper('session');
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        $userModel = new DangNhapModel();
        $user = $userModel->where('username', $username)
                         ->where('password', $password)
                         ->first();

        if ($user) {
            // Xác thực thành công
            if ($user['MaTaiKhoan'] == 1 || $user['MaTaiKhoan'] == 2) 
            {
                session()->set('id', $user['id']);
                session()->set('logged_in', true);

                if ($user['MaTaiKhoan'] == 1) {
                    return redirect()->to(base_url('admin'));
                } elseif ($user['MaTaiKhoan'] == 2) {
                    return redirect()->to(base_url('user'));
                }
            }
        } else {
            // Xác thực thất bại, lưu thông báo lỗi vào session
            session()->setFlashdata('login_error', 'Thông tin đăng nhập sai.');
            return redirect()->to('/');
        }
    }



    public function logout() {
    }

}


