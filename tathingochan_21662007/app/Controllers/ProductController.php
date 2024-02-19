<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;



class ProductController extends Controller
{
    public function index()
    {

        try {
            $product = new ProductModel();
            $data['product'] = $product->findAll();
            // var_dump($data['category']); // Bỏ dòng var_dump
            return view('admin/product/index', $data);
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());
            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            echo 'Đã xảy ra lỗi. Vui lòng thử lại sau.';
        }

    }
    // //edit
    public function edit($MaSP)
    {
        $product = new ProductModel();
        $data['product'] = $product->find((int) $MaSP);

        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('admin/product/edit', $data);
    }
    public function update($MaSP)
    {  
        $product = new ProductModel();
        
        // Get the current product data
        $currentProduct = $product->find($MaSP);
    
        // Kiểm tra xem tệp đã được tải lên chưa
        if ($this->request->getFile('HinhAnhSP')->isValid()){
            // Tệp hợp lệ, tiếp tục với quá trình tải lên
            $file = $this->request->getFile('HinhAnhSP');
            $imageName = $file->getName();
            $file->move(ROOTPATH . 'public/uploads/', $imageName);
    
            $data = [
                'TenSP' => $this->request->getPost('TenSP'),
                'GiaSP' => $this->request->getPost('GiaSP'),
                'MoTaSP' => $this->request->getPost('MoTaSP'),
                'SoLuongSP' => $this->request->getPost('SoLuongSP'),
                'HinhAnhSP' => $imageName,
                'DacBiet' => $this->request->getPost('DacBiet'),
                'MaTheLoai' => $this->request->getPost('MaTheLoai')
            ];
        } else {
            // Nếu không có tệp mới, giữ nguyên tên tệp cũ
            $data = [
                'TenSP' => $this->request->getPost('TenSP'),
                'GiaSP' => $this->request->getPost('GiaSP'),
                'MoTaSP' => $this->request->getPost('MoTaSP'),
                'SoLuongSP' => $this->request->getPost('SoLuongSP'),
                'HinhAnhSP' => $currentProduct['HinhAnhSP'], // Keep the current image
                'DacBiet' => $this->request->getPost('DacBiet'),
                'MaTheLoai' => $this->request->getPost('MaTheLoai')
            ];
        }
    
        if ($product->update($MaSP, $data)) {
            // Cập nhật thành công, gửi thông báo flash
            return redirect()->to(base_url('admin/product'))->with('success', 'Cập nhật thành công.');
        } else {
            // Xử lý lỗi khi cập nhật
            // ...
        }
    }
    
    
    // Xóa sản phẩm
    public function delete($MaSP)
    {
        try {
            $product = new ProductModel();

            // Kiểm tra xem sản phẩm có tồn tại không
            $existingProduct = $product->find((int)$MaSP);

            if (!$existingProduct) {
                // sản phẩm không tồn tại, chuyển hướng với thông báo lỗi hoặc xử lý tùy thuộc vào trường hợp
                return redirect()->to(base_url('admin/product'))->with('error', 'Sản phẩm không tồn tại.');
            }

            if ($product->delete($MaSP)) {
                return redirect()->to(base_url('admin/product'))->with('success', 'Xóa sản phẩm thành công.');
            } else {
               
            }
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());

            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            return redirect()->to(base_url('admin/product'))->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll(); // Lấy danh sách các thể loại từ cơ sở dữ liệu
    
        return view('admin/product/create', $data);
    }

    public function add()
    {
            $product = new ProductModel();
                    // Kiểm tra xem tệp đã được tải lên chưa
        if ($this->request->getFile('HinhAnhSP')->isValid()) {
            $file = $this->request->getFile('HinhAnhSP');
            $imageName = $file->getName();      
            $file->move(ROOTPATH . 'public/uploads/', $imageName);
                $data = [
                    'TenSP' => $this->request->getPost('TenSP'),
                    'GiaSP' => $this->request->getPost('GiaSP'),
                    'MoTaSP' => $this->request->getPost('MoTaSP'),
                    'SoLuongSP' => $this->request->getPost('SoLuongSP'),
                    'HinhAnhSP' => $imageName,
                    'DacBiet' => $this->request->getPost('DacBiet'),
                    'MaTheLoai' => $this->request->getPost('MaTheLoai'),
                ];

                $product->save($data);
                return redirect()->to(base_url('admin/product'))->with('success', 'Thêm thành công.');
            } else {
                return redirect()->to(base_url('admin/product'))->with('error', 'Hình ảnh không hợp lệ.');
    

            }
    }
}