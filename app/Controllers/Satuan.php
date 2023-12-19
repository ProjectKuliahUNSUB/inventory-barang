<?php
namespace App\Controllers;

use App\Models\M_Satuan;
use CodeIgniter\Controller;

class Satuan extends Controller
{
    private $title;
    private $satuan_model;
    protected $role;
    public function __construct()
    {
        $this->title = "Satuan Barang";
        $this->satuan_model = new M_Satuan();
        $this->role = strtolower(session('user')['role'] ?? '');
        helper(['form']);

    }
    public function index()
    {

        $data_table['data'] = $this->satuan_model->getSatuan();
        $data_table['header'] = ['satuan', 'keterangan'];
        $data_table['fields'] = ['nama_satuan', 'keterangan_satuan'];
        $data_table['primaryKey'] = 'id_satuan';
        $data = [
            'title' => $this->title,
            'content' => view('pages/satuan/index', ['table' => view('components/tabels-noimg', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        $dataForm['role'] = $this->role;
        $data = [
            'title' => $this->title,
            'content' => view('pages/satuan/form_tambah', $dataForm),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_satuan' => 'required',
            'keterangan_satuan' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $namaSatuan = $this->request->getPost('nama_satuan');
        $keteranganSatuan = $this->request->getPost('keterangan_satuan');

        if (empty($namaSatuan) || empty($keteranganSatuan)) {
            return redirect()->back()->withInput()->with('error', 'Nama satuan dan keterangan satuan harus diisi.');
        }

        $data = [
            'nama_satuan' => $namaSatuan,
            'keterangan_satuan' => $keteranganSatuan
        ];
        
        $result = $this->satuan_model->insertSatuan($data);
        if ($result) {
            return redirect()->to($this->role . '/satuan')->with('success', 'Nama satuan berhasil dibuat.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Nama satuan Gagal dibuat.');
        }
    }
    public function edit($id)
    {
        $dataSatuan = $this->satuan_model->getSatuanById($id);
        $data = [
            'title' => $this->title,
            'content' => view('pages/satuan/form_edit', ['dataSatuan' => $dataSatuan, 'role' => $this->role]),
        ];
        echo view('layout', $data);
    }
    public function update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_satuan' => 'required',
            'keterangan_satuan' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'keterangan_satuan' => $this->request->getPost('keterangan_satuan'),
        ];

        $result = $this->satuan_model->updateSatuan($this->request->getPost('id'), $data);
        if ($result) {
            return redirect()->to($this->role . '/satuan')->with('success', 'Nama Satuan berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('errors', $result);
        }
    }
    public function delete($id)
    {
        $hapus = $this->satuan_model->deleteByid($id);
        if ($hapus) {
            $msg = 'Nama Satuan berhasil dihapus.';
            $status = 'success';
        } else {
            $msg = 'Nama Satuan gagal dihapus.';
            $status = 'errors';
        }
        return redirect()->to($this->role . '/satuan')->with($status, $msg);
    }
}