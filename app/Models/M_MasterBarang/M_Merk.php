<?php
namespace App\Models\M_MasterBarang;

use CodeIgniter\Model;

class M_Merk extends Model
{
    protected $table = 'tbl_merk';
    protected $primaryKey = 'merk_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['merk_id', 'merk_nama', 'merk_slug', 'merk_keterangan', 'created_at', 'updated_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertMerk($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getMerk()
    {
        return $this->findAll();
    }
    public function getMerkById($merk_id)
    {
        return $this->find($merk_id);
    }
    public function updateMerk($merk_id, $data)
    {
        $this->update($merk_id, $data);
    }
    public function deleteMerk($merk_id)
    {
        $this->delete($merk_id);
    }
}
