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
        // $sdValue = $this->request->getGet('sd');
        // $edValue = $this->request->getGet('ed');
        // if (empty($sdValue) && empty($edValue)) {
        //     $defaultSd = date('Y-m-d', strtotime('-30 days'));
        //     $defaultEd = date('Y-m-d');

        //     return redirect()->to($this->role . "/dashboard/?sd=$defaultSd&ed=$defaultEd");
        // }


        $modelBarang = new M_MasterBarang();

        $databarang = $modelBarang->getMasterBarang();
        $id_barang = $this->request->getVar('id_barang');
        $date_range = $this->request->getVar('date_range');
        $date_range_array = explode(' - ', $date_range);
        $date_start = isset($date_range_array[0]) ? $date_range_array[0] : false;
        $date_end = isset($date_range_array[1]) ? $date_range_array[1] : false;
        $content = [
            'databarang' => $databarang,
            'barang' => null,
            'chartdata' => null,
            'date_range' => $date_range
        ];
        $data = [
            'title' => 'Dashboard Page'
        ];
        if (isset($id_barang) && isset($date_range)) {
            // Convert to yyyy-mm-dd format
            $date_start = \DateTime::createFromFormat('m/d/Y', $date_start)->format('Y-m-d');
            $date_end = \DateTime::createFromFormat('m/d/Y', $date_end)->format('Y-m-d');
            $content['barang'] = $modelBarang->getBarangDashboardCard($id_barang);
            $data['sd'] = $date_start;
            $data['ed'] = $date_end;
            $content['chartdata'] = json_encode($modelBarang->getChartData($id_barang, $date_start, $date_end));
            $data5 = array(
                'bg' => 'bg-success',
                'icon' => 'fas fa-circle-down',
                'title' => 'Barang Masuk',
                'value' => $content['barang'][0]['jumlah_barang_masuk'],
                'unit' => $content['barang'][0]['nama_satuan']
            );
            $data6 = array(
                'bg' => 'bg-danger',
                'icon' => 'fas fa-circle-up',
                'title' => 'Barang Keluar',
                'value' => $content['barang'][0]['jumlah_barang_keluar'],
                'unit' => $content['barang'][0]['nama_satuan']
            );
            $data4 = array(
                'bg' => 'bg-warning',
                'icon' => 'fas fa-box ',
                'title' => 'Total Barang',
                'value' => $content['barang'][0]['jumlah_barang'],
                'unit' => $content['barang'][0]['nama_satuan']
            );

            $view_content =
                view('components/info-box', $data4) .
                view('components/info-box', $data5) .
                view('components/info-box', $data6);
            $content['view_content'] = $view_content;
        } else {
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
            $data4 = array(
                'bg' => 'bg-warning',
                'icon' => 'fas fa-box ',
                'title' => 'Total Barang',
                'value' => 0,
                'unit' => 'Qty'
            );

            $view_content =
                view('components/info-box', $data5) .
                view('components/info-box', $data6) .
                view('components/info-box', $data4);
            $content['view_content'] = $view_content;
        }

        $data['content'] = view('dashboard', $content);

        echo view('layout', $data);
    }
}
