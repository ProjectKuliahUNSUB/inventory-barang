<?php
namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\Controller;
use App\Libraries\Claviska\SimpleImage;

class Users extends Controller
{
    private $title;
    protected $role;
    protected $m_models;
    public function __construct()
    {
        $this->title = "User";
        $this->m_models = new M_User();
        $this->role = strtolower(session('user')['role'] ?? '');
        helper('image');
        helper(['form']);
    }
    public function index()
    {
        $data_table['data'] = $this->m_models->getUser();
        $data_table['primaryKey'] = 'id';
        $data_table['judul'] = $this->title;
        $data_table['header'] = ['Username', 'nama', 'Role'];
        $data_table['fields'] = ['username', 'nama', 'role'];
        $data = [
            'title' => $this->title,
            'content' => view('pages/users/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => $this->title,
            'content' => view('pages/users/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageData = processAndUploadImage($image);
            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $role = $this->request->getPost('role');
            $userData = [
                'nama' => $nama,
                'img' => $imageData,
                'username' => $username,
                'password' => $password,
                'role' => $role,
            ];
            $this->m_models->insert($userData);
            return redirect()->to($this->role . '/users')->with('success', 'Pengguna berhasil dibuat.');
        } else {
            return redirect()->back()->withInput()->with('errors', ['image' => 'Harap unggah file gambar yang valid.']);
        }
    }
    public function edit($id)
    {
        $dataUsers = $this->m_models->getUserById($id);
        $data = [
            'title' => $this->title,
            'content' => view('pages/users/form_edit', ['dataUsers' => $dataUsers]),
        ];
        echo view('layout', $data);
    }
    public function update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required',
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
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $role = $this->request->getPost('role');
        $userData = [
            'nama' => $nama,
            'img' => $imageData,
            'username' => $username,
            'role' => $role,
        ];
        $this->m_models->updateUser($this->request->getPost('id'), $userData);
        return redirect()->to($this->role . '/users')->with('success', 'Pengguna berhasil diperbarui.');
    }
    public function delete($id)
    {
        $hapus = $this->m_models->deleteByid($id);
        if ($hapus) {
            $msg = 'Data Pengguna berhasil dihapus.';
            $status = 'success';
        } else {
            $msg = 'Data Pengguna gagal dihapus.';
            $status = 'errors';
        }
        return redirect()->to($this->role . '/users')->with($status, $msg);
    }
}
