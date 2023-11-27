<?php
namespace App\Controllers\MasterBarang;

use App\Models\M_MasterBarang\M_Jenis;
use CodeIgniter\Controller;

class Jenis extends Controller
{
    private $title;

    public function __construct()
    {
        
        $this->title = "Jenis Barang";
    }

    public function index()
    {
        $jenisModel = new M_Jenis();
        $data_table['data'] = $jenisModel->getJenis();
        $data_table['header'] = ['jenis_barang', 'keterangan'];
        $data_table['fields'] = ['jenisbarang_nama', 'jenisbarang_ket'];
        $data = [
            'title' => $this->title,
            'content' => view('pages/jenis/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => $this->title,
            'content' => view('pages/jenis/form_tambah'),
        ];
        echo view('layout', $data);
    }
}
