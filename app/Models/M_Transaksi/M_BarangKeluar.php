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
        $this->select('trx_barang_keluar.*, tabel_barang.nama_barang, tabel_barang.satuan_barang');
        $this->join('tabel_barang', 'tabel_barang.id_barang = trx_barang_keluar.id_barang');
        $query = $this->get();

        return $query->getResultArray();
    }
    // public function getBarangKeluar()
    // {
    //     return $this->findAll();
    // }
    public function getBarangKeluarById($id_bk)
    {
        return $this->find($id_bk);
    }
    public function updateBarangKeluar($id_bk, $data)
    {
        $this->update($id_bk, $data);
    }
    public function deleteBarangKeluar($id_bk)
    {
        $this->delete($id_bk);
    }
}
