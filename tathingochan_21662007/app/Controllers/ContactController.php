<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Controller;

class ContactController extends Controller
{
   

    public function index()
    {
        return view('user/contact');


    }
    public function submitForm()
    {
        // Lấy dữ liệu từ form
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $message = $this->request->getPost('message');
    
        // Kiểm tra và xử lý dữ liệu nếu cần
    
        // Lưu vào cơ sở dữ liệu
        $contactModel = new ContactModel();
        $data = [
            'contact_name' => $name,
            'contact_email' => $email,
            'contact_phone' => $phone,
            'contact_message' => $message,
         
        ];
    
        $result = $contactModel->insert($data);
        if (!$result) {
            $error = $contactModel->errors();
            var_dump($error);
        }
            // Xóa giá trị trước đó của các trường đã nhập

        session()->remove(['name', 'email', 'phone', 'message']);

    
        // Chuyển hướng hoặc hiển thị thông báo thành công
        return redirect()->to('/contact')->withInput();
    }
    
}
