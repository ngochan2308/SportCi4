<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'MaSP';
    protected $useAutoIncrement = true; // Sử dụng tự động tăng cho trường khóa chính MaSP
    protected $allowedFields = ['MaSP', 'TenSP', 'GiaSP', 'MoTaSP','SoLuongSP', 'HinhAnhSP', 'DacBiet', 'MaTheLoai'];
    protected $validationRules = [
        'TenSP' => 'required', // Đảm bảo trường 'TenSP' không được đặt là null
        // Các quy tắc validation khác nếu cần
    ];

    public function getProducts()
    {
        return $this->findAll(); // Lấy toàn bộ danh sách thể loại
    }

    
    public function searchProducts($keyword)
    {
        return $this->like('TenSP', $keyword)
                    ->findAll();
    }

    public function countAll()
    {
        return $this->countAllResults(); // Sử dụng phương thức của Model để đếm số lượng bản ghi
    }
}