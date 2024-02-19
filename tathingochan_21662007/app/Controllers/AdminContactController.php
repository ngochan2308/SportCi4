<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContactModel;

class AdminContactController extends Controller
{
    public function index()
    {
        try {
            $contact = new ContactModel();

            //'contact' -> tên biến 
            $data['contact'] = $contact->findAll();
         
            return view('admin/contact/index', $data);
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());
            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            echo 'Đã xảy ra lỗi. Vui lòng thử lại sau.';
        }
    }
   
    // Xóa thể loại
    public function delete($ContactID)
    {
        try {
            $contact = new ContactModel();

            // Kiểm tra xem thể loại có tồn tại không
            $existingContact = $contact->find((int)$ContactID);

            if (!$existingContact) {
                // Thể loại không tồn tại, chuyển hướng với thông báo lỗi hoặc xử lý tùy thuộc vào trường hợp
                return redirect()->to(base_url('admin/contact'))->with('error', 'Thể loại không tồn tại.');
            }

            if ($contact->delete($ContactID)) {
                return redirect()->to(base_url('admin/contact'))->with('success', 'Xóa thể loại thành công.');
            } else {
               
            }
        } catch (\Exception $e) {
            // Ghi log lỗi
            log_message('error', $e->getMessage());

            // Hiển thị thông báo lỗi hoặc chuyển hướng đến trang lỗi
            return redirect()->to(base_url('admin/contact'))->with('error', 'Đã xảy ra lỗi. Vui lòng thử lại sau.');
        }
    }

     

     
}