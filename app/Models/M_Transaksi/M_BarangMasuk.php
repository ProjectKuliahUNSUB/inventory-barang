<?php
namespace App\Models\M_Transaksi;

use CodeIgniter\Model;

class M_BarangMasuk extends Model
{
    protected $table = 'trx_barang_masuk';
    protected $primaryKey = 'id_bm';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_bm', 'kode_masuk', 'id_barang', 'tgl_masuk', 'jumlah', 'customer'];
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
        $this->select('trx_barang_masuk.*, master_barang.nama_barang, master_barang.satuan_barang');
        $this->join('master_barang', 'master_barang.id_barang = trx_barang_masuk.id_barang');
        $query = $this->get();

        return $query->getResultArray();
    }
    // public function getBarangMasuk()
    // {
    //     return $this->findAll();
    // }
    public function getBarangMasukById($id_bm)
    {
        return $this->find($id_bm);
    }
    public function updateBarangMasuk($id, $data)
    {
        $this->db->table($this->table)->update($data, array('id_bm' => $id));
    }
    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array('id_bm' => $id));

    }
}
