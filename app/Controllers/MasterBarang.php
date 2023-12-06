<?php
namespace App\Controllers;

use App\Models\M_MasterBarang;
use CodeIgniter\Controller;

class MasterBarang extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        $this->role = strtolower(session('user')['role'] ?? '');
        $this->title = "Master Barang";
        $this->m_models = new M_MasterBarang();

        helper('image');
        helper(['form']);
    }

    public function index()
    {
        // [DONE] index customer.
        $data_table['data'] = $this->m_models->getMasterBarang();
        $data_table['customclass'] = 'table-main-mb';
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
    public function tambah()
    {
        // [DONE] tambah barang.
        $data = [
            'title' => $this->title,
            'content' => view('pages/masterbarang/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        // [DONE] tambah barang.

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'merk_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageData = processAndUploadImage($image);
            $nama_barang = $this->request->getPost('nama_barang');
            $satuan_barang = $this->request->getPost('satuan_barang');
            $merk_barang = $this->request->getPost('merk_barang');
            $harga = $this->request->getPost('harga');
            $keterangan = $this->request->getPost('keterangan');
            $data = [
                'img' => $imageData,
                'nama_barang' => $nama_barang,
                'satuan_barang' => $satuan_barang,
                'merk_barang' => $merk_barang,
                'harga' => $harga,
                'keterangan' => $keterangan,
            ];
            $this->m_models->insert($data);
            return redirect()->to($this->role . '/master-barang')->with('success', 'Barang berhasil ditambah.');
        } else {
            return redirect()->back()->withInput()->with('errors', ['image' => 'Harap unggah file gambar yang valid.']);
        }
    }
    public function edit($id)
    {
        $dataBarang = $this->m_models->getBarangById($id);
        $data = [
            'title' => $this->title,
            'content' => view('pages/masterbarang/form_edit', ['dataBarang' => $dataBarang]),
        ];
        echo view('layout', $data);
    }
    public function update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'merk_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $imageData = '';
        $imgBase64 = $this->request->getPost('imgBase64');
        if ($this->request->getFile('image')->isValid()) {
            $validation->setRules([
                'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
            ]);
            $image = $this->request->getFile('image');
            $imageData = processAndUploadImage($image);
        } elseif (!empty($imgBase64)) {
            $imageData = $imgBase64;
        }
        $nama_barang = $this->request->getPost('nama_barang');
        $satuan_barang = $this->request->getPost('satuan_barang');
        $merk_barang = $this->request->getPost('merk_barang');
        $harga = $this->request->getPost('harga');
        $keterangan = $this->request->getPost('keterangan');
        $data = [
            'img' => $imageData,
            'nama_barang' => $nama_barang,
            'satuan_barang' => $satuan_barang,
            'merk_barang' => $merk_barang,
            'harga' => $harga,
            'keterangan' => $keterangan,
        ];
        $this->m_models->updateBarang($this->request->getPost('id'), $data);
        return redirect()->to($this->role . '/master-barang')->with('success', 'Barang berhasil diperbarui.');
    }
    public function delete($id)
    {
        $hapus = $this->m_models->deleteByid($id);
        if ($hapus) {
            $msg = 'Data Barang berhasil dihapus.';
            $status = 'success';
        } else {
            $msg = 'Data Barang gagal dihapus.';
            $status = 'errors';
        }
        return redirect()->to($this->role . '/master-barang')->with($status, $msg);
    }
}
