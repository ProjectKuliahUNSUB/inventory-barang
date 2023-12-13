<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_MasterBarang;

class Dashboard extends Controller
{
    protected $role;
    public function __construct()
    {
        $this->role = strtolower(session('user')['role'] ?? '');
    }

    public function index()
    {
        $sdValue = $this->request->getGet('sd');
        $edValue = $this->request->getGet('ed');

        // Check if 'sd' and 'ed' are empty
        if (empty($sdValue) && empty($edValue)) {
            // Calculate default values (last 30 days for 'sd' and today for 'ed')
            $defaultSd = date('Y-m-d', strtotime('-30 days'));
            $defaultEd = date('Y-m-d');

            // Redirect to the default URL
            return redirect()->to($this->role . "/dashboard?sd=$defaultSd&ed=$defaultEd");
        }

        // [TODO][Dummy Data] index barang.



        $modelBarang = new M_MasterBarang();

        $databarang = $modelBarang->getMasterBarang();
        $id_barang = $this->request->getVar('id_barang');
        $date_range = $this->request->getVar('date_range');
        $content = [
            // 'view_content' => $view_content,
            'databarang' => $databarang,
            'sd' => $sdValue,
            'ed' => $edValue,
            'barang' => null,
            'date_range' => $date_range
        ];
        if (isset($id_barang) && isset($date_range)) {
            // Split the string into an array using the hyphen as the delimiter
            $date_range_array = explode(' - ', $date_range);

            // Extract start and end dates from the array
            $date_start = isset($date_range_array[0]) ? $date_range_array[0] : '';
            $date_end = isset($date_range_array[1]) ? $date_range_array[1] : '';
            $content['barang'] = $modelBarang->getBarangDashboardCard($id_barang);



            $data4 = array(
                'bg' => 'bg-warning',
                'icon' => 'fas fa-box ',
                'title' => 'Total Barang',
                'value' => $content['barang'][0]['jumlah_barang'],
                'unit' => $content['barang'][0]['satuan_barang']
            );
            $data5 = array(
                'bg' => 'bg-success',
                'icon' => 'fas fa-circle-down',
                'title' => 'Barang Masuk',
                'value' => $content['barang'][0]['jumlah_barang_masuk'],
                'unit' => $content['barang'][0]['satuan_barang']
            );
            $data6 = array(
                'bg' => 'bg-danger',
                'icon' => 'fas fa-circle-up',
                'title' => 'Barang Keluar',
                'value' => $content['barang'][0]['jumlah_barang_keluar'],
                'unit' => $content['barang'][0]['satuan_barang']
            );

            $view_content =
                view('components/info-box', $data4) .
                view('components/info-box', $data5) .
                view('components/info-box', $data6);
            $content['view_content'] = $view_content;
        } else {
            $data4 = array(
                'bg' => 'bg-warning',
                'icon' => 'fas fa-box ',
                'title' => 'Total Barang',
                'value' => 0,
                'unit' => 'Qty'
            );
            $data5 = array(
                'bg' => 'bg-success',
                'icon' => 'fas fa-circle-down',
                'title' => 'Barang Masuk',
                'value' => 0,
                'unit' => 'Qty'
            );
            $data6 = array(
                'bg' => 'bg-danger',
                'icon' => 'fas fa-circle-up',
                'title' => 'Barang Keluar',
                'value' => 0,
                'unit' => 'Qty'
            );

            $view_content =
                view('components/info-box', $data4) .
                view('components/info-box', $data5) .
                view('components/info-box', $data6);
            $content['view_content'] = $view_content;
        }

        $data = [
            'title' => 'Dashboard Page',
            'start_date' => $sdValue,
            'end_date' => $edValue,
            'content' => view('dashboard', $content)
        ];

        echo view('layout', $data);
    }
}
