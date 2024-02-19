<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileUserModel;
use App\Helpers\AuthHelper;

class ProfileController extends Controller
{
    public function index()
    {
        helper(['AuthHelper']);

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!AuthHelper::isLoggedIn()) {
            return redirect()->to('/');
        }

        // Lấy thông tin người dùng từ session
        $id = session()->get('id');

        // Kiểm tra xem ID có tồn tại
        if ($id) {
            // Truy vấn thông tin chi tiết người dùng từ database
            $profileUserModel = new ProfileUserModel();
            $userInfo = $profileUserModel->find($id);

            // Kiểm tra xem có dữ liệu người dùng hay không
            if ($userInfo) {
                // Hiển thị thông tin người dùng trên trang profile
                return view('user/profile/index', ['userInfo' => $userInfo]);
            } else {
                // Xử lý trường hợp người dùng không tồn tại trong CSDL
                return redirect()->to('/')->with('error', 'Người dùng không tồn tại.');
            }
        } else {
            // Xử lý trường hợp không có ID trong session
            return redirect()->to('/')->with('error', 'Không có ID người dùng.');
        }
    }

     // //edit
     public function edit()
     {
        $id = session()->get('id');
        $profileUserModel = new ProfileUserModel();
        $userInfo = $profileUserModel->find($id);

        return view('user/profile/edit_profile', ['userInfo' => $userInfo]);
     }
     public function update()
     {  
        $profileUserModel = new ProfileUserModel();
         
        // Lấy thông tin người dùng từ session
        $id = session()->get('id');

        // Truy vấn thông tin chi tiết người dùng từ database
        $userInfo = $profileUserModel->find($id);

        if ($userInfo) {
            // Kiểm tra và xác nhận dữ liệu nhập liệu
            $validationRules = [
                'username' => 'required|min_length[3]|max_length[255]',
                'email' => 'required|valid_email|max_length[255]',
                'Fullname' => 'required|max_length[255]',
                'Gender' => 'required|in_list[Male,Female]',
                'Phone' => 'required|min_length[10]|max_length[15]',
                'Address' => 'required|max_length[255]',
                'Birthday' => 'required|valid_date',
            ];

            if ($this->validate($validationRules)) {
                // Dữ liệu hợp lệ, tiến hành cập nhật vào database
                $data = [
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'Fullname' => $this->request->getPost('Fullname'),
                    'Gender' => $this->request->getPost('Gender'),
                    'Phone' => $this->request->getPost('Phone'),
                    'Address' => $this->request->getPost('Address'),
                    'Birthday' => $this->request->getPost('Birthday'),
                ];

                // Cập nhật thông tin vào database
                $profileUserModel->update($id, $data);

                // Chuyển hướng về trang profile sau khi cập nhật
                return redirect()->to('/profile');
            } else {
                // Dữ liệu không hợp lệ, hiển thị trang chỉnh sửa với thông báo lỗi
                return view('user/profile/edit_profile', ['userInfo' => $userInfo, 'validation' => $this->validator]);
            }
        } else {
            // Người dùng không tồn tại trong CSDL
            return redirect()->to('/')->with('error', 'Người dùng không tồn tại.');
        }
    }
     
}
