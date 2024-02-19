<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'MaTheLoai';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['MaTheLoai', 'TenTheLoai', 'HinhAnhTheLoai'];

    public function getCategories()
    {
        return $this->findAll(); // Lấy toàn bộ danh sách thể loại
    }
    public function countAll()
    {
        return $this->countAllResults(); // Sử dụng phương thức của Model để đếm số lượng bản ghi
    }
}