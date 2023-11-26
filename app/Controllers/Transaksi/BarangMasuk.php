<?php
namespace App\Controllers\Transaksi;

use App\Models\M_Transaksi\M_BarangMasuk;
use CodeIgniter\Controller;

class BarangMasuk extends Controller
{
    public function index()
    {
        $jenisModel = new M_BarangMasuk();
        $data_table['data'] = $jenisModel->getBarangMasuk();
        $data_table['header'] = ['kode masuk', 'kode barang', 'customer id', 'tanggal', 'jumlah'];
        $data_table['fields'] = ['bm_kode', 'barang_kode', 'customer_id', 'bm_tanggal', 'bm_jumlah'];
        $data = [
            'title' => 'Barang Masuk',
            'content' => view('pages/t_barang_masuk/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
}




