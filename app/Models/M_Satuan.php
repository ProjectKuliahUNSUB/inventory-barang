<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Satuan extends Model
{
    protected $table = 'master_satuan_barang';
    protected $primaryKey = 'id_satuan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_satuan', 'satuan_nama', 'satuan_keterangan', 'created_at', 'updated_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function getSatuan()
    {
        return $this->findAll();
    }
    public function insertSatuan($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->insertID();
    }
    public function getSatuanById($id)
    {
        return $this->find($id);
    }
    public function updateSatuan($id, $data)
    {
        return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
    }
    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array($this->primaryKey => $id));

    }
}