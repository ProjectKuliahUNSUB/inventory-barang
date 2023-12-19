<?php
namespace App\Controllers\MasterBarang;

use App\Models\M_Satuan;
use CodeIgniter\Controller;

class Satuan extends Controller
{
    private $title;

    public function __construct()
    {

        $this->title = "Satuan Barang";
    }
    public function index()
    {
        // [DONE] index satuan.
        $satuanModel = new M_Satuan();
        $data_table['data'] = $satuanModel->getSatuan();
        $data_table['header'] = ['satuan_nama', 'keterangan'];
        $data_table['fields'] = ['satuan_nama', 'satuan_keterangan'];
        $data = [
            'title' => $this->title,
            'content' => view('pages/satuan/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        // [DONE] tambah barang.
        $data = [
            'title' => $this->title,
            'content' => view('pages/satuan/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        // [TODO] save satuan.
    }
    public function edit()
    {
        // [TODO] edit satuan.
    }
    public function update()
    {
        // [TODO] update satuan.
    }
    public function delete()
    {
        // [TODO] delete satuan.
    }
}