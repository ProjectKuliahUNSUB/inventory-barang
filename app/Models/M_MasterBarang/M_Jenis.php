<?php
namespace App\Models\M_MasterBarang;

use CodeIgniter\Model;

class M_Jenis extends Model
{
    protected $table = 'tbl_jenisbarang';
    protected $primaryKey = 'jenisbarang_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenisbarang_id', 'jenisbarang_nama', 'jenisbarang_slug', 'jenisbarang_ket', 'created_at', 'updated_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertJenis($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getJenis()
    {
        return $this->findAll();
    }
    public function getJenisById($jenisbarang_id)
    {
        return $this->find($jenisbarang_id);
    }
    public function updateJenis($jenisbarang_id, $data)
    {
        $this->update($jenisbarang_id, $data);
    }
    public function deleteJenis($jenisbarang_id)
    {
        $this->delete($jenisbarang_id);
    }
}
