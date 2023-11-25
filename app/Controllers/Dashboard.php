<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        $data1 = array(
            'bg' => 'bg-info',
            'icon' => 'fas fa-cog',
            'title' => 'First Component',
            'value' => 10,
            'unit' => '%'
        );

        $data2 = array(
            'bg' => 'bg-success',
            'icon' => 'fas fa-heart',
            'title' => 'Second Component',
            'value' => 50,
            'unit' => 'MB'
        );

        $data3 = array(
            'bg' => 'bg-warning',
            'icon' => 'fas fa-exclamation-triangle',
            'title' => 'Third Component',
            'value' => 75,
            'unit' => 'GB'
        );

        $data4 = array(
            'bg' => 'bg-danger',
            'icon' => 'fas fa-skull-crossbones',
            'title' => 'Fourth Component',
            'value' => 100,
            'unit' => 'TB'
        );

        $view_content = view('components/info-box', $data1) .
            view('components/info-box', $data2) .
            view('components/info-box', $data3) .
            view('components/info-box', $data4);

        $data = [
            'title' => 'Dashboard Page',
            'content' => view('dashboard', ['view_content' => $view_content])
        ];

        echo view('layout', $data);
    }
}
