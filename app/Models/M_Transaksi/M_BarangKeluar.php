<?php
namespace App\Models\M_Transaksi;

use CodeIgniter\Model;

class M_BarangKeluar extends Model
{
    protected $table = 'tbl_barangkeluar';
    protected $primaryKey = 'bk_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['bk_id', 'bk_kode', 'barang_kode', 'bk_tanggal', 'bk_tujuan', 'bk_jumlah', 'created_at', 'updated_at'];
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    public function insertBarangKeluar($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getBarangKeluar()
    {
        return $this->findAll();
    }
    public function getBarangKeluarById($bk_id)
    {
        return $this->find($bk_id);
    }
    public function updateBarangKeluar($bk_id, $data)
    {
        $this->update($bk_id, $data);
    }
    public function deleteBarangKeluar($bk_id)
    {
        $this->delete($bk_id);
    }
}
