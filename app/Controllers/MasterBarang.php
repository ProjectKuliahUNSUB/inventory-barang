<?php
namespace App\Controllers;

use App\Models\M_MasterBarang;
use CodeIgniter\Controller;

class MasterBarang extends Controller {
    private $title;
    protected $role;
    public function __construct() {
        $this->role = strtolower(session('user')['role'] ?? '');
        $this->title = "Master Barang";
        helper('image');
        helper(['form']);
    }

    public function index() {
        // [DONE] index customer.
        $barangModel = new M_MasterBarang();
        $data_table['data'] = $barangModel->getMasterBarang();
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
            ['jumlah_barang_masuk', 'satuan_barang'],
            ['jumlah_barang_keluar', 'satuan_barang'],
            'total_harga',
            ['jumlah_barang', 'satuan_barang'],
            'tanggal_update',
            'keterangan',

        ];
        $data = [
            'title' => $this->title,
            'content' => view('pages/masterbarang/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah() {
        // [DONE] tambah barang.
        $data = [
            'title' => $this->title,
            'content' => view('pages/masterbarang/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save() {
        // [TODO] save customer.
    }
    public function edit() {
        // [TODO] edit customer.
    }
    public function update() {
        // [TODO] update customer.
    }
    public function delete() {
        // [TODO] delete customer.
    }
}
