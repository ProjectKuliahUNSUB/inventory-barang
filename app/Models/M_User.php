<?php

namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{
    protected $table = 'tbl_users';

    protected $allowedFields = ['username', 'password', 'role', 'name', 'img'];

    // Your custom methods for user management
}
