<?php
namespace App\Controllers;

use App\Models\M_Customer;
use CodeIgniter\Controller;

class Customer extends Controller
{
    public function index()
    {
        $barangModel = new M_Customer();
        $data_table['data'] = $barangModel->getCustomer();
        $data_table['judul'] = 'Customer';
        $data_table['header'] = ['nama', 'alamat', 'no telp'];
        $data_table['fields'] = ['customer_nama', 'customer_alamat', 'customer_notelp'];
        $data = [
            'title' => 'Customer',
            'content' => view('pages/customer/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
}
