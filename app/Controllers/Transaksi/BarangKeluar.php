<?php
namespace App\Controllers\Transaksi;

use App\Models\M_Transaksi\M_BarangKeluar;
use CodeIgniter\Controller;

class BarangKeluar extends Controller
{
    private $title;

    public function __construct()
    {

        $this->title = 'Barang Keluar';
    }
    public function index()
    {
        // [DONE] index barang keluar.
        $jenisModel = new M_BarangKeluar();
        $data_table['primaryKey'] = 'id_bk';
        $data_table['data'] = $jenisModel->getBarangKeluar();

        $data_table['header'] = ['Kode Keluar', 'Nama barang', 'tanggal keluar', 'tujuan', 'jumlah'];
        $data_table['fields'] = ['kode_keluar', 'nama_barang', 'tgl_keluar', 'tujuan', ['jumlah', 'satuan_barang']];
        $data = [
            'title' => $this->title,
            'content' => view('pages/t_barang_keluar/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        // [DONE] tambah barang.
        $data = [
            'title' => $this->title,
            'content' => view('pages/t_barang_keluar/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        // [TODO] save barang keluar.
    }
    public function edit()
    {
        // [TODO] edit barang keluar.
    }
    public function update()
    {
        // [TODO] update barang keluar.
    }
    public function delete()
    {
        // [TODO] delete barang keluar.
    }
}




