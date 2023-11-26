<?php
namespace App\Controllers;


use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        echo view('login');
    }
}
