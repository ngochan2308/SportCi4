<?php

namespace App\Models;

use CodeIgniter\Model;

class DangNhapModel extends Model
{
    protected $table = 'taikhoan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'username', 'password', 'MaTaiKhoan', 'email', 'Fullname', 'Address', 'Gender', 'Phone', 'Birthday'];

    protected $validationRules = [
        'username' => 'is_unique[taikhoan.username]',
        'email'    => 'is_unique[taikhoan.email]',
        
    ];
    
}