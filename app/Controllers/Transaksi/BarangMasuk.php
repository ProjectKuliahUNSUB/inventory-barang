<?php
namespace App\Controllers\Transaksi;

use CodeIgniter\Controller;
use App\Models\M_Transaksi\M_BarangMasuk;
use App\Models\M_MasterBarang;
use Michalsn\Uuid\Uuid;

class BarangMasuk extends Controller
{
    private $title;
    private $role;
    private $bm_model;
    public function __construct()
    {
        helper(['form']);
        $this->title = 'Barang Masuk';
        $this->role = strtolower(session('user')['role'] ?? '');
        $this->bm_model = new M_BarangMasuk();
    }
    public function index()
    {
        $data_table['data'] = $this->bm_model->getBarangMasuk();
        $data_table['primaryKey'] = 'id_bm';
        $data_table['header'] = ['kode masuk', ' Nama barang', 'customer', 'tanggal', 'jumlah'];
        $data_table['fields'] = ['kode_masuk', 'nama_barang', 'customer', 'tgl_masuk', ['jumlah', 'satuan_barang']];
        $data = [
            'title' => $this->title,
            'content' => view('pages/t_barang_masuk/index', ['table' => view('components/tabels', $data_table)])
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
            'content' => view('pages/t_barang_masuk/form_tambah', $dataForm),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'bm_kode' => 'required',
            'id_barang' => 'required',
            'bm_tanggal' => 'required',
            'bm_customer' => 'required',
            'bm_jumlah' => 'required|numeric',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_masuk' => $this->request->getPost('bm_kode'),
            'id_barang' => $this->request->getPost('id_barang'),
            'tgl_masuk' => $this->request->getPost('bm_tanggal'),
            'customer' => $this->request->getPost('bm_customer'),
            'jumlah' => $this->request->getPost('bm_jumlah'),
        ];
        $result = $this->bm_model->insert($data);
        if ($result) {
            return redirect()->to($this->role . '/transaksi/barang-masuk')->with('success', 'Pengguna berhasil dibuat.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Pengguna Gagal dibuat.');
        }
    }
    public function edit($id)
    {
        $modelBarang = new M_MasterBarang();
        $dataBarangMasuk = $this->bm_model->getBarangMasukById($id);
        $data = [
            'title' => $this->title,
            'content' => view('pages/t_barang_masuk/form_edit', ['dataBarangMasuk' => $dataBarangMasuk, 'role' => $this->role, 'databarang' => $modelBarang->getMasterBarang()]),
        ];
        echo view('layout', $data);
    }
    public function update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'bm_kode' => 'required',
            'id_barang' => 'required',
            'bm_tanggal' => 'required',
            'bm_customer' => 'required',
            'bm_jumlah' => 'required|numeric',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_masuk' => $this->request->getPost('bm_kode'),
            'id_barang' => $this->request->getPost('id_barang'),
            'tgl_masuk' => $this->request->getPost('bm_tanggal'),
            'customer' => $this->request->getPost('bm_customer'),
            'jumlah' => $this->request->getPost('bm_jumlah'),
        ];
        $result = $this->bm_model->updateBarangMasuk($this->request->getPost('id'), $data);
        if ($result) {
            return redirect()->to($this->role . '/transaksi/barang-masuk')->with('success', 'Data Barang Masuk berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('errors', $result);
        }

    }
    public function delete($id)
    {
        $hapus = $this->bm_model->deleteByid($id);
        if ($hapus) {
            $msg = 'Data Barang Masuk berhasil dihapus.';
            $status = 'success';
        } else {
            $msg = 'Data Barang Masuk gagal dihapus.';
            $status = 'errors';
        }
        return redirect()->to($this->role . '/transaksi/barang-masuk')->with($status, $msg);
    }
}




