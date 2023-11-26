<?php
namespace App\Controllers\Transaksi;

use App\Models\M_Transaksi\M_BarangKeluar;
use CodeIgniter\Controller;

class BarangKeluar extends Controller
{
    public function index()
    {
        $jenisModel = new M_BarangKeluar();
        $data_table['data'] = $jenisModel->getBarangKeluar();
        $data_table['header'] = ['Kode Keluar', 'kode barang', 'tanggal keluar', 'tujuan', 'jumlah'];
        $data_table['fields'] = ['bk_kode', 'barang_kode', 'bk_tanggal', 'bk_tujuan', 'bk_jumlah'];
        $data = [
            'title' => 'Barang Keluar',
            'content' => view('pages/t_barang_keluar/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
}




