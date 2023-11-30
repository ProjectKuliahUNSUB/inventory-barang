<?php
// app/Controllers/AuthController.php
namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        // Add your login logic here
        $model = new M_User();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Login successful, set user role in session
            $session = session();
            $session->set('role', $user['role']);

            return redirect()->to('/dashboard'); // Change this to your dashboard route
        } else {
            // Login failed, redirect back to login page
            return redirect()->to('/a')->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        // Add your logout logic here
        $session = session();
        $session->destroy();

        return redirect()->to('/login'); // Change this to your login route
    }
}
