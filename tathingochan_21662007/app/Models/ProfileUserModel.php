<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileUserModel extends Model
{
    protected $table = 'taikhoan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'password', 'email', 'Fullname', 'Gender', 'Phone', 'Address','Birthday', 'HinhAnh'];

    protected $validationRules = [
        'username' => 'is_unique[taikhoan.username,id,{id}]|min_length[3]',
        'email'    => 'is_unique[taikhoan.email,id,{id}]|valid_email|min_length[6]',
        'password' => 'min_length[6]',
    ];

  public function isUnique($username, $email, $id)
{
    $existingUser = $this->where('id !=', $id)
                        ->where('username', $username)
                        ->orWhere('email', $email)
                        ->first();

    return $existingUser === null;
}

public function countAll()
{
    return $this->countAllResults(); // Sử dụng phương thức của Model để đếm số lượng bản ghi
}

}