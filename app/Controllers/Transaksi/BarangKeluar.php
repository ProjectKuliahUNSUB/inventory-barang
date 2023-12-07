<?php
namespace App\Controllers\Transaksi;

use App\Models\M_MasterBarang;
use App\Models\M_Transaksi\M_BarangKeluar;
use CodeIgniter\Controller;
use Michalsn\Uuid\Uuid;

class BarangKeluar extends Controller
{
    private $title;
    protected $role;
    protected $bk_model;
    public function __construct()
    {
        helper(['form']);
        $this->role = strtolower(session('user')['role'] ?? '');
        $this->title = 'Barang Keluar';
        $this->bk_model = new M_BarangKeluar();
    }
    public function index()
    {

        $data_table['primaryKey'] = 'id_bk';
        $data_table['data'] = $this->bk_model->getBarangKeluar();
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
        $modelBarang = new M_MasterBarang();

        $dataForm['databarang'] = $modelBarang->getMasterBarang();
        $dataForm['uuid'] = $string;
        $dataForm['role'] = $this->role;

        $data = [
            'title' => $this->title,
            'content' => view('pages/t_barang_keluar/form_tambah', $dataForm),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'bk_kode' => 'required',
            'id_barang' => 'required',
            'bk_jumlah' => 'required|numeric',
            'bk_tujuan' => 'required',
            'bk_tanggal' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_keluar' => $this->request->getPost('bk_kode'),
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah' => $this->request->getPost('bk_jumlah'),
            'tujuan' => $this->request->getPost('bk_tujuan'),
            'tgl_keluar' => $this->request->getPost('bk_tanggal'),
        ];

        // Save the data to the database using your model
        $result = $this->bk_model->insert($data);
        if ($result) {
            return redirect()->to($this->role . '/transaksi/barang-keluar')->with('success', 'Pengguna berhasil dibuat.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Pengguna Gagal dibuat.');
        }
    }
    public function edit($id)
    {
        $modelBarang = new M_MasterBarang();



        $dataBarangKeluar = $this->bk_model->getBarangKeluarById($id);
        $data = [
            'title' => $this->title,

            'content' => view('pages/t_barang_keluar/form_edit', ['dataBarangKeluar' => $dataBarangKeluar, 'role' => $this->role, 'databarang' => $modelBarang->getMasterBarang()]),
        ];
        echo view('layout', $data);
    }
    public function update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'bk_kode' => 'required',
            'id_barang' => 'required',
            'bk_jumlah' => 'required|numeric',
            'bk_tujuan' => 'required',
            'bk_tanggal' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_keluar' => $this->request->getPost('bk_kode'),
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah' => $this->request->getPost('bk_jumlah'),
            'tujuan' => $this->request->getPost('bk_tujuan'),
            'tgl_keluar' => $this->request->getPost('bk_tanggal'),
        ];

        // $this->bk_model->updateBarang($this->request->getPost('id'), $data);
        $result = $this->bk_model->updateBarangKeluar($this->request->getPost('id'), $data);

        if ($result) {
            return redirect()->to($this->role . '/transaksi/barang-keluar')->with('success', 'Data Barang Keluar berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('errors', $result);

        }

    }
    public function delete($id)
    {
        $hapus = $this->bk_model->deleteByid($id);
        if ($hapus) {
            $msg = 'Data Barang Keluar berhasil dihapus.';
            $status = 'success';
        } else {
            $msg = 'Data Barang Keluar gagal dihapus.';
            $status = 'errors';
        }
        return redirect()->to($this->role . '/transaksi/barang-keluar')->with($status, $msg);
    }
}




