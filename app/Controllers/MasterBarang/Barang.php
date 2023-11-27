<?php
namespace App\Controllers\MasterBarang;

use App\Models\M_MasterBarang\M_Barang;
use CodeIgniter\Controller;

class Barang extends Controller
{
    public function index()
    {
        $barangModel = new M_Barang();
        $data_table['data'] = $barangModel->getBarang();
        $data_table['judul'] = 'Barang';
        $data_table['header'] = ['kode barang', 'nama barang', 'harga barang', 'stok barang', 'gambar barang'];
        $data_table['fields'] = ['barang_kode', 'barang_nama', 'barang_harga', 'barang_stok', 'barang_gambar'];
        $data = [
            'title' => 'Barang',
            'content' => view('pages/barang/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Barang',
            'content' => view('pages/barang/form_tambah'),
        ];
        echo view('layout', $data);
    }
}
