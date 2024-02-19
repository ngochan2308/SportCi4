<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $category = new CategoryModel();
            $data['category'] = $category->findAll();
            // var_dump($data['category']); // Bỏ dòng var_dump
            return view('admin/category/index', $data);
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());
            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            echo 'Đã xảy ra lỗi. Vui lòng thử lại sau.';
        }
    }
    // //edit
    public function edit($MaTheLoai)
    {
        $category = new CategoryModel();
        $data['category'] = $category->find((int) $MaTheLoai);
        return view('admin/category/edit', $data);
    }
    public function update($MaTheLoai)
    {  
        $category = new CategoryModel();
        
        // Kiểm tra xem tệp đã được tải lên chưa
        if ($this->request->getFile('HinhAnhTheLoai')->isValid()) {
            // Tệp hợp lệ, tiếp tục với quá trình tải lên
            $file = $this->request->getFile('HinhAnhTheLoai');
                    // Giữ nguyên tên file gốc
                    $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/uploads/', $imageName);
    
            $data = [
                'TenTheLoai' => $this->request->getPost('TenTheLoai'),
                'HinhAnhTheLoai' => $imageName
            ];
        } else {
            // Nếu không có tệp mới, giữ nguyên tên tệp cũ
            $data = [
                'TenTheLoai' => $this->request->getPost('TenTheLoai'),
                'HinhAnhTheLoai' => $this->request->getPost('HinhAnhTheLoai')
            ];
        }
        
        if ($category->update($MaTheLoai, $data)) {
            // Cập nhật thành công, gửi thông báo flash
            return redirect()->to(base_url('admin/category'))->with('success', 'Cập nhật thành công.');
        } else {
            // Xử lý lỗi khi cập nhật
            // ...
        }
    }
    
    // Xóa thể loại
    public function delete($MaTheLoai)
    {
        try {
            $category = new CategoryModel();

            // Kiểm tra xem thể loại có tồn tại không
            $existingCategory = $category->find((int)$MaTheLoai);

            if (!$existingCategory) {
                // Thể loại không tồn tại, chuyển hướng với thông báo lỗi hoặc xử lý tùy thuộc vào trường hợp
                return redirect()->to(base_url('admin/category'))->with('error', 'Thể loại không tồn tại.');
            }

            if ($category->delete($MaTheLoai)) {
                return redirect()->to(base_url('admin/category'))->with('success', 'Xóa thể loại thành công.');
            } else {
               
            }
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());

            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            return redirect()->to(base_url('admin/category'))->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }

      // thêm
      public function create()
      {
          return view('admin/category/create');
      }

      public function add()
      {
          $category = new CategoryModel();
      
          // Kiểm tra xem tệp đã được tải lên chưa
          if ($this->request->getFile('HinhAnhTheLoai')->isValid()) {
            $file = $this->request->getFile('HinhAnhTheLoai');
            // Giữ nguyên tên file gốc
            $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/uploads/', $imageName);
        
            $data = [
                'TenTheLoai' => $this->request->getPost('TenTheLoai'),
                'HinhAnhTheLoai' => $imageName,
            ];
        
            $category->save($data);
            return redirect()->to(base_url('admin/category'))->with('success', 'Thêm thành công.');
        } else {
            return redirect()->to(base_url('admin/category'))->with('error', 'Hình ảnh không hợp lệ.');
        }
      }
      
      

     
}