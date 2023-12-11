<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // [TODO][Dummy Data] index barang.


        $data4 = array(
            'bg' => 'bg-warning',
            'icon' => 'fas fa-box ',
            'title' => 'Total Barang',
            'value' => 10,
            'unit' => 'Qty'
        );

        $data5 = array(
            'bg' => 'bg-success',
            'icon' => 'fas fa-circle-down',
            'title' => 'Barang Masuk',
            'value' => 10,
            'unit' => 'Qty'
        );

        $data6 = array(
            'bg' => 'bg-danger',
            'icon' => 'fas fa-circle-up',
            'title' => 'Barang Keluar',
            'value' => 10,
            'unit' => 'Qty'
        );



        $view_content =
            view('components/info-box', $data4) .
            view('components/info-box', $data5) .
            view('components/info-box', $data6);


        $data = [
            'title' => 'Dashboard Page',
            'content' => view('dashboard', ['view_content' => $view_content])
        ];

        echo view('layout', $data);
    }
}
