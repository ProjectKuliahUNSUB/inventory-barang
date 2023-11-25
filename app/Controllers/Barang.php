<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Barang extends Controller
{
    public function index()
    {
        $data_table['judul'] = 'Barang';
        $data_table['fields'] = ['Rendering engine', 'Browser', 'Platform(s)', 'Engine version', 'CSS grade'];
        $data_table['data'] = [
            ['Rendering engine' => 'Trident', 'Browser' => 'Internet Explorer 4.0', 'Platform(s)' => 'Win 95+', 'Engine version' => '4', 'CSS grade' => 'X'],
            ['Rendering engine' => 'Other browsers', 'Browser' => 'All others', 'Platform(s)' => '-', 'Engine version' => '-', 'CSS grade' => 'U'],
        ];


        $data = [
            'title' => 'Barang',
            'content' => view('pages/barang/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
}
