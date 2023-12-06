<?php
namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\Controller;

class Auth extends Controller {
    protected $m_models;
    public function __construct() {
        $this->m_models = new M_User();
        helper(['form']);
        helper('image');
    }
    public function index() {
        return view('login');
    }
    public function accessDenied() {
        return view('access_denied');
    }
    public function login() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userModel = new M_User();
        $user = $userModel->where('username', $username)
            ->first();
        if($user && password_verify($password, $user['password'])) {
            $userData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'nama' => $user['nama'],
                'role' => $user['role'],
                'img' => $user['img'],



            ];
            session()->set('user', $userData);

            if($user['role'] === 'Admin') {

                return redirect()->to('/admin/dashboard')->with('success', 'Berhasil Login. Selamat Datang '.$user['nama']);
            } else {

                return redirect()->to('/operator/dashboard')->with('success', 'Berhasil Login. Selamat Datang '.$user['nama']);
            }
        } else {


            return redirect()->to('/auth/login')->with('error', 'Invalid credentials');
        }
    }
    public function register() {
        $userData = $this->m_models->getUser();
        if(empty($userData)) {
            return view('register');
        } else {
            return redirect()->to('login');
        }
    }
    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
    public function saveRegister() {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
        ]);
        if(!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $image = $this->request->getFile('image');
        if($image->isValid() && !$image->hasMoved()) {
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
            return redirect()->to('login')->with('success', 'Pengguna berhasil dibuat.');
        } else {
            return redirect()->to('register')->with('errors', ['image' => 'Harap unggah file gambar yang valid.']);
        }
    }
}
