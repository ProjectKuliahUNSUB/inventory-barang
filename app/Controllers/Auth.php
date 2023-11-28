<?php
namespace App\Controllers;


use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        // [TODO] config auth multi role.
        echo view('login');
    }
}
