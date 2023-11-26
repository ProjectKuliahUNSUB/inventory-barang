<?php
namespace App\Controllers\MasterBarang;

use App\Models\M_MasterBarang\M_Merk;
use CodeIgniter\Controller;

class Merk extends Controller
{
    public function index()
    {
        $merkModel = new M_Merk();
        $data_table['data'] = $merkModel->getMerk();
        $data_table['header'] = ['merk_nama', 'keterangan'];
        $data_table['fields'] = ['merk_nama', 'merk_keterangan'];
        $data = [
            'title' => 'Merk Barang',
            'content' => view('pages/merk/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
}
