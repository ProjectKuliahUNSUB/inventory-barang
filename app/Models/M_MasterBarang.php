<?php

namespace App\Models;

use CodeIgniter\Model;

class M_MasterBarang extends Model {
    protected $table = 'master_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'satuan_barang', 'merk_barang', 'harga', 'keterangan','img'];

    public function getMasterBarang() {
        $builder = $this->db->table($this->table.' tb');
        $builder->select(
            'tb.id_barang,
            tb.nama_barang,
            tb.satuan_barang,
            tb.merk_barang,
            tb.keterangan,
            tb.harga,
            COALESCE(SUM(tbm.jumlah), 0) AS jumlah_barang_masuk,
            COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang_keluar,
            COALESCE(SUM(tbm.jumlah), 0) - COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang,
            COALESCE(SUM(tbm.jumlah * tb.harga), 0) - COALESCE(SUM(tbk.jumlah * tb.harga), 0) AS total_harga,
            MAX(tbm.tgl_masuk) AS tanggal_update'
        );
        $builder->join('trx_barang_masuk tbm', 'tb.id_barang = tbm.id_barang', 'left');
        $builder->join('trx_barang_keluar tbk', 'tb.id_barang = tbk.id_barang', 'left');
        $builder->groupBy('tb.id_barang, tb.nama_barang, tb.satuan_barang, tb.merk_barang, tb.keterangan, tb.harga');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
