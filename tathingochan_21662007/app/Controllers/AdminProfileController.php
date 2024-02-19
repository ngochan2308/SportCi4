<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfileUserModel;
use App\Helpers\AuthHelper;

class AdminProfileController extends Controller
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
                 return view('admin/profile/index', ['userInfo' => $userInfo]);
             } else {
                 // Xử lý trường hợp người dùng không tồn tại trong CSDL
                 return redirect()->to('/')->with('error', 'Người dùng không tồn tại.');
             }
         } else {
             // Xử lý trường hợp không có ID trong session
             return redirect()->to('/')->with('error', 'Không có ID người dùng.');
         }
    }
}
