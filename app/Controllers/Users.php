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
        $data_table['primaryKey'] = 'id';
        $data_table['judul'] = $this->title;
        $data_table['header'] = ['Username', 'nama', 'Role'];
        $data_table['fields'] = ['username', 'nama', 'role'];
        $data = [
            'title' => $this->title,
            'content' => view('pages/users/index', ['table' => view('components/tabels', $data_table)])
        ];
        echo view('layout', $data);
    }
    public function tambah()
    {
        // [DONE] tambah Users.
        helper(['form']);
        $data = [
            'title' => $this->title,
            'content' => view('pages/users/form_tambah'),
        ];
        echo view('layout', $data);
    }
    public function save()
    {
        $validation = \Config\Services::validation();

        // Set validation rules for form fields
        $validation->setRules([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]',
        ]);

        // Check if validation rules pass
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle image upload
        $image = $this->request->getFile('image');
        $imageName = $image->getRandomName();
        $image->move(WRITEPATH . 'uploads', $imageName);

        // Convert image to base64
        $imageData = base64_encode(file_get_contents(WRITEPATH . 'uploads/' . $imageName));
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $role = $this->request->getPost('role');

        $userData = [
            'nama' => $nama,
            'img' => $imageData,
            'username' => $username,
            'password' => $password,
            'role' => $role,
        ];

        $userModel = new M_User(); // Replace with your actual model
        $userModel->insert($userData);

        return redirect()->to('users')->with('success', 'User created successfully.');
    }
    // public function save()
    // {
    //     if ($this->request->getMethod() === 'post' && $this->validate(['image' => 'uploaded[image]|max_size[image,1024]'])) {
    //         $image = $this->request->getFile('image');
    //         $imageData = file_get_contents($image->getTempName());
    //         $base64Image = base64_encode($imageData);
    //         $nama = $this->request->getPost('nama');
    //         $username = $this->request->getPost('username');
    //         $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    //         $role = $this->request->getPost('role');
    //         $Model = new M_User();
    //         $Data = [
    //             'name' => $nama,
    //             'img' => $base64Image,
    //             'username' => $username,
    //             'password' => $password,
    //             'role' => $role,
    //         ];
    //         $Model->insert($Data);
    //     }
    //     return redirect()->to('users');
    // }

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
