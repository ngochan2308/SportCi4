<?php

namespace App\Models;

use CodeIgniter\Model;

class HoaDonModel extends Model
{
    protected $table = 'hoadon';
    protected $primaryKey = 'MaHoaDon';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Fullname', 'email', 'Phone', 'Address', 'PhuongThucTT']; 

    public function insertHoaDon($userInfo)
    {
        // Đảm bảo $userInfo có đủ thông tin để thêm vào cơ sở dữ liệu

        // Thực hiện thêm dữ liệu
        $this->insert($userInfo);

        // Trả về ID của bản ghi vừa thêm
        return $this->db->insertID();
    }
}