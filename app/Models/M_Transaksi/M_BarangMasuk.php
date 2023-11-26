<?php
namespace App\Models\M_Transaksi;

use CodeIgniter\Model;

class M_BarangMasuk extends Model
{
    protected $table = 'tbl_barangmasuk';
    protected $primaryKey = 'bm_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['bm_id', 'bm_kode', 'barang_kode', 'customer_id', 'bm_tanggal', 'bm_jumlah', 'created_at', 'updated_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertBarangMasuk($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getBarangMasuk()
    {
        return $this->findAll();
    }
    public function getBarangMasukById($bm_id)
    {
        return $this->find($bm_id);
    }
    public function updateBarangMasuk($bm_id, $data)
    {
        $this->update($bm_id, $data);
    }
    public function deleteBarangMasuk($bm_id)
    {
        $this->delete($bm_id);
    }
}
