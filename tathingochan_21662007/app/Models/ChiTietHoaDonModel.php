<?php

namespace App\Models;

use CodeIgniter\Model;

class ChiTietHoaDonModel extends Model
{
    protected $table = 'chitiethoadon';
    protected $primaryKey = 'MaChiTietHoaDon';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['MaHoaDon', 'MaSP', 'SoLuong', 'DonGia', 'ThanhTien'];

}