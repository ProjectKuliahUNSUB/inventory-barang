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
        $data_table['customclass'] = 'table-main-laporan';
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
            ['jumlah_barang_masuk', 'nama_satuan'],
            ['jumlah_barang_keluar', 'nama_satuan'],
            'total_harga',
            ['jumlah_barang', 'nama_satuan'],
            'tanggal_update',
            'keterangan',

        ];
        $data = [
            'title' => $this->title,
            'content' => view('pages/laporan/index', ['table' => view('components/tabels-laporan', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function exPDF()
    {
        $start_date = $this->request->getGet('start_date');
        $end_date = $this->request->getGet('end_date');

        $data_table_json = json_encode($this->m_models->getMasterBarangLaporan($start_date, $end_date));
        echo view('components/exports/pdf', [
            'data_table_json' => $data_table_json,
            'date_start' => $start_date,
            'date_end' => $end_date
        ]);
    }
}
