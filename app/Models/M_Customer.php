<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Customer extends Model
{
    protected $table = 'tbl_customer';
    protected $primaryKey = 'customer_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['customer_id', 'customer_nama', 'customer_slug', 'customer_alamat', 'customer_notelp', 'created_at', 'updated_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertCustomer($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getCustomer()
    {
        return $this->findAll();
    }
    public function getCustomerById($jenisbarang_id)
    {
        return $this->find($jenisbarang_id);
    }
    public function updateCustomer($jenisbarang_id, $data)
    {
        $this->update($jenisbarang_id, $data);
    }
    public function deleteCustomer($jenisbarang_id)
    {
        $this->delete($jenisbarang_id);
    }
}
