<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Satuan extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Satuan',
            'content' => view('pages/satuan/index')
        ];
        echo view('layout', $data);
    }
}
