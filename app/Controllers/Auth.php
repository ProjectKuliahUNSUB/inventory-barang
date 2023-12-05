<?php
namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        echo view('login');
    }
    public function accessDenied()
    {
        return view('access_denied');
    }
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userModel = new M_User();
        $user = $userModel->where('username', $username)
            ->first();
        if ($user && password_verify($password, $user['password'])) {
            $userData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'nama' => $user['nama'],
                'role' => $user['role'],
                'img' => $user['img'],



            ];
            session()->set('user', $userData);

            if ($user['role'] === 'Admin') {

                return redirect()->to('/admin/dashboard')->with('success', 'Berhasil Login. Selamat Datang ' . $user['nama']);
            } else {

                return redirect()->to('/operator/dashboard')->with('success', 'Berhasil Login. Selamat Datang ' . $user['nama']);
            }
        } else {


            return redirect()->to('/auth/login')->with('error', 'Invalid credentials');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }

}
