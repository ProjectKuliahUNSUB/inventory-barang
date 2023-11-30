<?php
namespace App\Models;

use CodeIgniter\Model;

class M_User extends Model
{

    protected $table = 'tbl_users';
    protected $primaryKey = 'username';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'password', 'role', 'name', 'img'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertUser($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getUser()
    {
        return $this->findAll();
    }
    public function getUserById($users_id)
    {
        return $this->find($users_id);
    }
    public function updateUser($users_id, $data)
    {
        $this->update($users_id, $data);
    }
    public function deleteUser($users_id)
    {
        $this->delete($users_id);
    }
}
