<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Satuan extends Model
{
    protected $table = 'tbl_satuan';
    protected $primaryKey = 'satuan_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['satuan_nama', 'satuan_slug', 'satuan_keterangan', 'created_at', 'updated_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertSatuan($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getAllSatuan()
    {
        return $this->findAll();
    }
    public function getSatuanById($satuan_id)
    {
        return $this->find($satuan_id);
    }
    public function updateSatuan($satuan_id, $data)
    {
        $this->update($satuan_id, $data);
    }
    public function deleteSatuan($satuan_id)
    {
        $this->delete($satuan_id);
    }
}
