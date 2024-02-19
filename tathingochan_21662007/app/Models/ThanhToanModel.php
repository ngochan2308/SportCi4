<?php

namespace App\Models;

use CodeIgniter\Model;

class ThanhToanModel extends Model
{
    protected $table = 'taikhoan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Fullname', 'email', 'Phone', 'Address']; 

    public function getUserInfo($id)
    {
        return $this->select('Fullname, email, Phone, Address')
                    ->find($id);
    }

}
