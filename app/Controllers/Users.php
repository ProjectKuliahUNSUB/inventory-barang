<?php
namespace App\Controllers;

use App\Models\M_User;
use CodeIgniter\Controller;

class Users extends Controller
{
    private $title;

    public function __construct()
    {

        $this->title = "User";
    }

    public function index()
    {
        // [DONE] index User.
        $Modles = new M_User();
        $data_table['data'] = $Modles->getUser();
        $data_table['judul'] = $this->title;
        $data_table['header'] = ['Username', 'name', 'Role'];
        $data_table['fields'] = ['username', 'name', 'role'];
        $data = [
            'title' => $this->title,
            'content' => view('pages/users/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        // [DONE] tambah Users.
        $data = [
            'title' => $this->title,
            'content' => view('pages/users/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        // [TODO] save Users.
    }
    public function edit()
    {
        // [TODO] edit Users.
    }
    public function update()
    {
        // [TODO] update Users.
    }
    public function delete()
    {
        // [TODO] delete Users.
    }
}
