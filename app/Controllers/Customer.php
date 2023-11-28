<?php
namespace App\Controllers;

use App\Models\M_Customer;
use CodeIgniter\Controller;

class Customer extends Controller
{
    private $title;

    public function __construct()
    {

        $this->title = "Customer";
    }

    public function index()
    {
        // [DONE] index customer.
        $barangModel = new M_Customer();
        $data_table['data'] = $barangModel->getCustomer();
        $data_table['judul'] = $this->title;
        $data_table['header'] = ['nama', 'alamat', 'no telp'];
        $data_table['fields'] = ['customer_nama', 'customer_alamat', 'customer_notelp'];
        $data = [
            'title' => $this->title,
            'content' => view('pages/customer/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        // [DONE] tambah barang.
        $data = [
            'title' => $this->title,
            'content' => view('pages/customer/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        // [TODO] save customer.
    }
    public function edit()
    {
        // [TODO] edit customer.
    }
    public function update()
    {
        // [TODO] update customer.
    }
    public function delete()
    {
        // [TODO] delete customer.
    }
}
