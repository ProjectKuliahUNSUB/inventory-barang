<?php
namespace App\Controllers;

use App\Models\M_MasterBarang;
use CodeIgniter\Controller;

class Laporan extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        $this->role = strtolower(session('user')['role'] ?? '');
        $this->title = "Laporan Barang Masuk Dan Keluar";
        $this->m_models = new M_MasterBarang();

        helper('image');
        helper(['form']);
    }

    public function index()
    {
        // [DONE] index customer.
        $data_table['data'] = $this->m_models->getMasterBarang();
        $data_table['primaryKey'] = 'id_barang';
        $data_table['judul'] = $this->title;
        $data_table['header'] = [
            'nama_barang',
            'merk_barang',
            'harga',
            'barang_masuk',
            'barang_keluar',
            'total_harga',
            'jumlah_barang',
            'tanggal_update',
            'keterangan',
        ];
        $data_table['fields'] = [
            'nama_barang',
            'merk_barang',
            'harga',
            ['jumlah_barang_masuk', 'satuan_barang'],
            ['jumlah_barang_keluar', 'satuan_barang'],
            'total_harga',
            ['jumlah_barang', 'satuan_barang'],
            'tanggal_update',
            'keterangan',

        ];
        $data = [
            'title' => $this->title,
            'content' => view('pages/masterbarang/index', ['table' => view('components/tabels-laporan', $data_table)])
        ];
        echo view('layout', $data);
    }

}
