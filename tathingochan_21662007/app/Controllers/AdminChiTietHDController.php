<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ChiTietHoaDonModel;

class AdminChiTietHDController extends Controller
{
    public function index()
    {
        try {
            $chitiethd = new ChiTietHoaDonModel();

            //'hoadon' -> tên biến 
            $data['chitiethd'] = $chitiethd->findAll();
         
            return view('admin/chitiethd/index', $data);
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());
            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            echo 'Đã xảy ra lỗi. Vui lòng thử lại sau.';
        }
    }
   
    // Xóa thể loại
    public function delete($chitiethdID)
    {
        try {
            $chitiethd = new ChiTietHoaDonModel();

            // Kiểm tra xem thể loại có tồn tại không
            $existingChiTietHD = $chitiethd->find((int)$chitiethdID);

            if (!$existingChiTietHD) {
                // Thể loại không tồn tại, chuyển hướng với thông báo lỗi hoặc xử lý tùy thuộc vào trường hợp
                return redirect()->to(base_url('admin/chitiethd'))->with('error', 'Hóa đơn không tồn tại.');
            }

            if ($chitiethd->delete($chitiethdID)) {
                return redirect()->to(base_url('admin/chitiethd'))->with('success', 'Xóa hóa đơn thành công.');
            } else {
               
            }
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());

            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            return redirect()->to(base_url('admin/chitiethd'))->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }

     

     
}