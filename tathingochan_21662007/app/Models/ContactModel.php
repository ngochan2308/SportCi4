<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'blog_contact';
    protected $primaryKey = 'contact_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['contact_name', 'contact_email', 'contact_phone', 'contact_message'];

    public function getContacts()
    {
        return $this->findAll(); // Lấy toàn bộ danh sách thể loại
    }
}