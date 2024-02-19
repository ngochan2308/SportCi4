<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HoaDonModel;

class AdminHoaDonController extends Controller
{
    public function index()
    {
        try {
            $hoadon = new HoaDonModel();

            //'hoadon' -> tên biến 
            $data['hoadon'] = $hoadon->findAll();
         
            return view('admin/hoadon/index', $data);
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());
            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            echo 'Đã xảy ra lỗi. Vui lòng thử lại sau.';
        }
    }
   
    // Xóa thể loại
    public function delete($HoaDonID)
    {
        try {
            $hoadon = new HoaDonModel();

            // Kiểm tra xem thể loại có tồn tại không
            $existingHoaDon = $hoadon->find((int)$HoaDonID);

            if (!$existingHoaDon) {
                // Thể loại không tồn tại, chuyển hướng với thông báo lỗi hoặc xử lý tùy thuộc vào trường hợp
                return redirect()->to(base_url('admin/hoadon'))->with('error', 'Thể loại không tồn tại.');
            }

            if ($hoadon->delete($HoaDonID)) {
                return redirect()->to(base_url('admin/hoadon'))->with('success', 'Xóa hóa đơn thành công.');
            } else {
               
            }
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());

            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            return redirect()->to(base_url('admin/hoadon'))->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }

     

     
}