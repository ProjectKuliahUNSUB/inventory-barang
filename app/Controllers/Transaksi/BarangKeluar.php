<?php
namespace App\Controllers\Transaksi;

use App\Models\M_Transaksi\M_BarangKeluar;
use CodeIgniter\Controller;
use Michalsn\Uuid\Uuid;

class BarangKeluar extends Controller
{
    private $title;

    public function __construct()
    {
        helper(['form']);

        $this->title = 'Barang Keluar';
    }
    public function index()
    {
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
        $uuid = new Uuid(new \Michalsn\Uuid\Config\Uuid());
        $uuid4 = $uuid->uuid4();
        $string = substr($uuid4->toString(), 0, 6);
        $data = [
            'title' => $this->title,
            'content' => view('pages/t_barang_keluar/form_tambah', ['uuid' => $string]),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}




