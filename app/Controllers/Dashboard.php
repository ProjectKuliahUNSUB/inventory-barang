<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // [TODO][Dummy Data] index barang.

        $data1 = array(
            'bg' => 'bg-info',
            'icon' => 'fas fa-list',
            'title' => 'Jenis Barang',
            'value' => 10,
            'unit' => 'Qty'
        );

        $data2 = array(
            'bg' => 'bg-info',
            'icon' => 'fas fa-scale-unbalanced-flip',
            'title' => 'Satuan Barang',
            'value' => 10,
            'unit' => 'Qty'
        );

        $data3 = array(
            'bg' => 'bg-info',
            'icon' => 'fas fa-brands fa-shopify',
            'title' => 'Merk Barang',
            'value' => 10,
            'unit' => 'Qty'
        );

        $data4 = array(
            'bg' => 'bg-warning',
            'icon' => 'fas fa-box ',
            'title' => 'Barang',
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

        $data7 = array(
            'bg' => 'bg-info',
            'icon' => 'fas fa-solid fa-users-line',
            'title' => 'Customer',
            'value' => 10,
            'unit' => 'Qty'
        );

        $data8 = array(
            'bg' => 'bg-success',
            'icon' => 'fas fa-user',
            'title' => 'User',
            'value' => 10,
            'unit' => 'Qty'
        );

        $view_content = view('components/info-box', $data1) .
            view('components/info-box', $data2) .
            view('components/info-box', $data3) .
            view('components/info-box', $data4) .
            view('components/info-box', $data5) .
            view('components/info-box', $data6) .
            view('components/info-box', $data7) .
            view('components/info-box', $data8);

        $data = [
            'title' => 'Dashboard Page',
            'content' => view('dashboard', ['view_content' => $view_content])
        ];

        echo view('layout', $data);
    }
}
