<?php

namespace App\Models;

use CodeIgniter\Model;

class M_MasterBarang extends Model
{
    protected $table = 'master_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'id_satuan', 'merk_barang', 'harga', 'keterangan', 'img'];

    public function getMasterBarang()
    {
        $builder = $this->db->table($this->table . ' tb');
        $builder->select(
            'tb.id_barang,
            tb.nama_barang,
            msb.nama_satuan,
            tb.merk_barang,
            tb.keterangan,
            tb.harga,
            tb.img,
            COALESCE(SUM(tbm.jumlah), 0) AS jumlah_barang_masuk,
            COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang_keluar,
            COALESCE(SUM(tbm.jumlah), 0) - COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang,
            COALESCE(SUM(tbm.jumlah * tb.harga), 0) - COALESCE(SUM(tbk.jumlah * tb.harga), 0) AS total_harga,
            MAX(tbm.tgl_masuk) AS tanggal_update'
        );
        $builder->join('trx_barang_masuk tbm', 'tb.id_barang = tbm.id_barang', 'left');
        $builder->join('trx_barang_keluar tbk', 'tb.id_barang = tbk.id_barang', 'left');
        $builder->join('master_satuan_barang msb', 'tb.id_satuan = msb.id_satuan', 'inner'); // Fix the join condition

        $builder->groupBy('tb.id_barang, tb.nama_barang, tb.id_satuan, tb.merk_barang, tb.keterangan, tb.harga,tb.img');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getMasterBarangLaporan($startDate = null, $endDate = null)
    {
        $builder = $this->db->table($this->table . ' tb');
        $builder->select(
            'tb.id_barang,
        tb.nama_barang,
        msb.nama_satuan,
        tb.merk_barang,
        tb.keterangan,
        tb.harga,
        tb.img,
        COALESCE(SUM(tbm.jumlah), 0) AS jumlah_barang_masuk,
        COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang_keluar,
        COALESCE(SUM(tbm.jumlah), 0) - COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang,
        COALESCE(SUM(tbm.jumlah * tb.harga), 0) - COALESCE(SUM(tbk.jumlah * tb.harga), 0) AS total_harga,
        MAX(tbm.tgl_masuk) AS tanggal_update'
        );
        $builder->join('trx_barang_masuk tbm', 'tb.id_barang = tbm.id_barang', 'left');
        $builder->join('trx_barang_keluar tbk', 'tb.id_barang = tbk.id_barang', 'left');
        $builder->join('master_satuan_barang msb', 'tb.id_satuan = msb.id_satuan', 'inner');

        // Add the date filtering condition for both trx_barang_masuk and trx_barang_keluar
        if ($startDate && $endDate) {
            $builder->where('tbm.tgl_masuk >=', $startDate);
            $builder->where('tbm.tgl_masuk <=', $endDate);
            $builder->where('tbk.tgl_keluar >=', $startDate);
            $builder->where('tbk.tgl_keluar <=', $endDate);
        }

        $builder->groupBy('tb.id_barang, tb.nama_barang, tb.id_satuan, tb.merk_barang, tb.keterangan, tb.harga,tb.img');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getBarangDashboardCard($id)
    {
        $builder = $this->db->table($this->table . ' tb');
        $builder->select(
            'tb.id_barang,
        tb.nama_barang,
        msb.nama_satuan,
        tb.merk_barang,
        tb.keterangan,
        tb.harga,
        tb.img,
        COALESCE(SUM(tbm.jumlah), 0) AS jumlah_barang_masuk,
        COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang_keluar,
        COALESCE(SUM(tbm.jumlah), 0) - COALESCE(SUM(tbk.jumlah), 0) AS jumlah_barang,
        COALESCE(SUM(tbm.jumlah * tb.harga), 0) - COALESCE(SUM(tbk.jumlah * tb.harga), 0) AS total_harga,
        MAX(tbm.tgl_masuk) AS tanggal_update'
        );
        $builder->join('trx_barang_masuk tbm', 'tb.id_barang = tbm.id_barang', 'left');
        $builder->join('trx_barang_keluar tbk', 'tb.id_barang = tbk.id_barang', 'left');
        $builder->join('master_satuan_barang msb', 'tb.id_satuan = msb.id_satuan', 'inner');

        $builder->where('tb.id_barang', $id);
        $builder->groupBy('tb.id_barang, tb.nama_barang, tb.id_satuan, tb.merk_barang, tb.keterangan, tb.harga,tb.img');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getChartData($id_barang, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table('trx_barang_keluar bk');
        $builder->select(
            "date_format(bk.created_at, '%Y-%m-%d') AS tanggal,
            'Barang Keluar' AS jenis,
            COALESCE(SUM(bk.jumlah), 0) AS jumlah"
        );
        $builder->where('bk.id_barang', $id_barang);

        // Add date range filtering
        if ($startDate !== null) {
            $builder->where('bk.created_at >=', $startDate);
        }
        if ($endDate !== null) {
            $builder->where('bk.created_at <=', $endDate);
        }

        $builder->groupBy('tanggal');
        $query2 = $builder->get();

        $builder = $this->db->table('trx_barang_masuk bm');
        $builder->select(
            "date_format(bm.created_at, '%Y-%m-%d') AS tanggal,
            'Barang Masuk' AS jenis,
            COALESCE(SUM(bm.jumlah), 0) AS jumlah"
        );
        $builder->where('bm.id_barang', $id_barang);

        // Add date range filtering
        if ($startDate !== null) {
            $builder->where('bm.created_at >=', $startDate);
        }
        if ($endDate !== null) {
            $builder->where('bm.created_at <=', $endDate);
        }

        $builder->groupBy('tanggal');
        $query3 = $builder->get();

        return array_merge($query2->getResultArray(), $query3->getResultArray());
    }

    public function insertBarang($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function getBarangById($id)
    {
        return $this->find($id);
    }
    public function updateBarang($id, $data)
    {
        $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
    }
    public function deleteByid($id)
    {
        return $this->db->table($this->table)->delete(array($this->primaryKey => $id));

    }
}
