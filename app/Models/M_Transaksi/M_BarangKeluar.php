<?php
namespace App\Models\M_Transaksi;

use CodeIgniter\Model;

class M_BarangKeluar extends Model
{
    protected $table = 'trx_barang_keluar';
    protected $primaryKey = 'id_bk';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_bk', 'kode_keluar', 'id_barang', 'tgl_keluar', 'tujuan', 'jumlah'];
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
        $this->select('trx_barang_keluar.*, master_barang.nama_barang, master_barang.satuan_barang');
        $this->join('master_barang', 'master_barang.id_barang = trx_barang_keluar.id_barang');
        $query = $this->get();

        return $query->getResultArray();
    }

    public function getBarangKeluarById($id_bk)
    {
        return $this->find($id_bk);
    }
    public function updateBarangKeluar($id, $data)
    {
        return $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
    }

    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array('id_bk' => $id));

    }
}
