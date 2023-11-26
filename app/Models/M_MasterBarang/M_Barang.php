<?php

namespace App\Models\M_MasterBarang;

use CodeIgniter\Model;

class M_Barang extends Model
{
    protected $table = 'tbl_barang';
    protected $primaryKey = 'barang_id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenisbarang_id', 'satuan_id', 'merk_id', 'barang_kode', 'barang_nama', 'barang_slug', 'barang_harga', 'barang_stok', 'barang_gambar', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getBarang($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }

    public function insertBarang($data)
    {
        return $this->insert($data);
    }

    public function updateBarang($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBarang($id)
    {
        return $this->delete($id);
    }
}
