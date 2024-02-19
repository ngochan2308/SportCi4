<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TaiKhoanModel;

class AccountUserController extends Controller
{
    public function index()
    {
        try {
            $account = new TaiKhoanModel();
            $data['account'] = $account->where('MaTaiKhoan', 2)->findAll();
            // var_dump($data['account']); // Bỏ dòng var_dump
            return view('admin/acc_user/index', $data);
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());
            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            echo 'Đã xảy ra lỗi. Vui lòng thử lại sau.';
        }
    }
        // thêm
        public function create()
        {
            return view('admin/acc_user/create');
        }

        public function add()
        {
            $account = new TaiKhoanModel();
            $validation = \Config\Services::validation();
            $validation->setRules([
                'username' => 'required|min_length[3]|is_unique[taikhoan.username]',
                'password' => 'required|min_length[6]',
                'email' => 'required|valid_email|is_unique[taikhoan.email]',
                'HinhAnh' => 'uploaded[HinhAnh]|is_image[HinhAnh]'

            ]);

                    // Kiểm tra sự tồn tại của username và email
            $username_exists = $account->where('username', $this->request->getPost('username'))->countAllResults();
            $email_exists = $account->where('email', $this->request->getPost('email'))->countAllResults();

            if ($username_exists > 0) {
                $data['username_error'] = 'Username đã được đăng ký.';
            }

            if ($email_exists > 0) {
                $data['email_error'] = 'Email đã được đăng ký.';
            }
                // Validate data
                    if (!$validation->run($this->request->getPost()) || $username_exists > 0 || $email_exists > 0) {

                    var_dump($validation->getErrors()); // Xem lỗi validation

                    return redirect()->to(base_url('admin/acc_user/create'))->withInput()->with('validation', $validation);
                }

                $file = $this->request->getFile('HinhAnh');
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = pathinfo($file->getName(), PATHINFO_FILENAME);
                    $file->move(ROOTPATH . 'public/uploads', $imageName);
                }else {
                    // Handle the case when the file upload fails
                    return redirect()->to(base_url('admin/acc_admin/create'))->with('error', 'Upload hình ảnh không thành công.');
                }

            $data = [
                'MaTaiKhoan' => 2, // giá trị mặc định vì nó là admin
                'username' => $this->request->getPost('username'),
                'password' => md5($this->request->getPost('password')),
                'email' => $this->request->getPost('email'),
                'Fullname' => $this->request->getPost('fullname'),
                'HinhAnh' => $imageName, 
                'Gender' => $this->request->getPost('gender'),
                'Phone' => $this->request->getPost('phone'),
                'Address' => $this->request->getPost('address'),
                'Birthday' => $this->request->getPost('birthday'),
            ];
        
            $account->insert($data);
            $insertedID = $account->insertID(); 
            return redirect()->to(base_url('admin/acc_user'))->with('success', 'Thêm thành công.');
        }
    

         // Xóa thể loại
    public function delete($id)
    {
        try {
            $account = new TaiKhoanModel();

            // Kiểm tra xem thể loại có tồn tại không
            $existingAccount = $account->find((int)$id);

            if (!$existingAccount) {
                // Thể loại không tồn tại, chuyển hướng với thông báo lỗi hoặc xử lý tùy thuộc vào trường hợp
                return redirect()->to(base_url('admin/acc_user'))->with('error', 'Tài khoản không tồn tại.');
            }

            if ($account->delete($id)) {
                return redirect()->to(base_url('admin/acc_user'))->with('success', 'Xóa tài khoản thành công.');
            } else {
               
            }
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());

            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            return redirect()->to(base_url('admin/acc_user'))->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }

    public function edit($id)
    {
        $account = new TaiKhoanModel();
        $data['account'] = $account->find((int) $id);
        return view ('admin/acc_user/edit', $data);
    }
        


public function update($id)
{
    $account = new TaiKhoanModel();
            // Kiểm tra giá trị của $data['HinhAnh']
            var_dump($_FILES);
    
            // Kiểm tra giá trị của $data['HinhAnh']
            var_dump($this->request->getPost());
    $data = [
        'username' => $this->request->getPost('username'),
        'password' => md5($this->request->getPost('password')),
        'email' => $this->request->getPost('email'),
        'Fullname' => $this->request->getPost('fullname'),
        'Gender' => $this->request->getPost('gender'),
        'Phone' => $this->request->getPost('phone'),
        'Address' => $this->request->getPost('address'),
        'Birthday' => $this->request->getPost('birthday'),
        'MaTaiKhoan' => $this->request->getPost('MaTaiKhoan'),
    ];

// Kiểm tra tính duy nhất của username và email
if (!$account->isUnique($data['username'], $data['email'], $id)) {
    var_dump($account->db->getLastQuery());
    return redirect()->to(base_url('admin/acc_user'))->with('error', 'Username hoặc Email đã tồn tại.');
}


        // Kiểm tra xem có file được tải lên hay không
        if ($file = $this->request->getFile('HinhAnh')) {
            // Xử lý upload file
            if ($file->isValid() && !$file->hasMoved()) {
                $imageName = pathinfo($file->getName(), PATHINFO_FILENAME);
                $file->move(ROOTPATH . 'public/uploads', $imageName);
                $data['HinhAnh'] = $imageName;
            } else {
                // Handle the case when the file upload fails
                return redirect()->to(base_url('admin/acc_user/edit/' . $id))->with('error', 'Upload hình ảnh không thành công.');
            }
        }
    
        if (empty($data['HinhAnh'])) {
            // Nếu không có file mới được chọn, giữ nguyên giá trị hiện tại của ảnh
            $currentData = $account->find($id);
            $data['HinhAnh'] = $currentData['HinhAnh'];
        }

if ($account->update($id, $data)) {
    var_dump($account->db->getLastQuery());
    return redirect()->to(base_url('admin/acc_user'))->with('success', 'Cập nhật thành công.');
} else {
    var_dump($account->db->getLastQuery());
    return redirect()->to(base_url('admin/acc_user'))->with('error', 'Cập nhật không thành công.');
}


}




     
}