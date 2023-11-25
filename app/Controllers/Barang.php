<?php
namespace App\Controllers;

use App\Models\M_Barang;
use CodeIgniter\Controller;

class Barang extends Controller
{
    public function index()
    {
        $barangModel = new M_Barang();
        $data_table['data'] = $barangModel->getBarang();
        $data_table['judul'] = 'Barang';
        $data_table['fields'] = ['barang_kode', 'barang_nama', 'barang_harga', 'barang_stok', 'barang_gambar'];
        $data = [
            'title' => 'Barang',
            'content' => view('pages/barang/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
}
