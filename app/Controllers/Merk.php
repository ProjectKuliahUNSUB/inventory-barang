<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Merk extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Merk',
            'content' => view('pages/merk/index')
        ];
        echo view('layout', $data);
    }
}
