<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Jenis extends Controller
{
    public function index()
    {


        $data = [
            'title' => 'Jenis',
            'content' => view('pages/jenis/index')
        ];
        echo view('layout', $data);
    }
}
