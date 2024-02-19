<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HoaDonModel;
use App\Models\ChiTietHoaDonModel;
use App\Models\ThanhToanModel;


class ThanhToanController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $id = session()->get('id');

        if ($id) {
            $thanhtoanModel = new ThanhToanModel();
            $userInfo = $thanhtoanModel->find($id);

            if ($userInfo) {
                $data['userInfo'] = $userInfo;
                $data['cart_items'] = session()->get('cart_items') ?? [];

                return view('user/thanhtoan', $data);
            } else {
                return redirect()->to('/')->with('error', 'Người dùng không tồn tại.');
            }
        } else {
            return redirect()->to('/')->with('error', 'Không có ID người dùng.');
        }
    }

    public function xuLyThanhToan()
    {
        $userInfo = [
            'Fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'Phone' => $this->request->getPost('phone'),
            'Address' => $this->request->getPost('address'),
            'PhuongThucTT' => $this->request->getPost('payment_method'), // Sử dụng phương thức của $this->request
        ];

        $cartItems = session()->get('cart_items') ?? [];

        $hoaDonModel = new HoaDonModel();
        $invoiceId = $hoaDonModel->insertHoaDon($userInfo);

        $chiTietHoaDonModel = new ChiTietHoaDonModel();
        foreach ($cartItems as $item) {
            $detailData = [
                'MaHoaDon' => $invoiceId,
                'MaSP' => $item['MaSP'],
                'SoLuong' => $item['SoLuongSP'],
                'DonGia' => $item['GiaSP'],
                'ThanhTien' => $item['SoLuongSP'] * $item['GiaSP'],
            ];

            $chiTietHoaDonModel->insert($detailData);
            // Cập nhật số lượng sản phẩm trong bảng sanpham nếu cần
            // ...
        }

        unset($_SESSION['cart_items']);
        $this->session->setFlashdata('success_message', 'Bạn đã đặt hàng thành công.');
        
        return redirect()->to(base_url('user'));
    }
}
