<?php
namespace App\Controllers\MasterBarang;

use App\Models\M_MasterBarang\M_Satuan;
use CodeIgniter\Controller;

class Satuan extends Controller
{
    public function index()
    {
        $satuanModel = new M_Satuan();
        $data_table['data'] = $satuanModel->getSatuan();
        $data_table['header'] = ['satuan_nama', 'keterangan'];
        $data_table['fields'] = ['satuan_nama', 'satuan_keterangan'];
        $data = [
            'title' => 'Satuan Barang',
            'content' => view('pages/satuan/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
}
