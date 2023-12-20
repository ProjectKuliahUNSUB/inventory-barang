<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Auth::index');
$routes->get('/login', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->get('access-denied', 'Auth::accessDenied');
$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('login', 'Auth::login');
    $routes->add('logout', 'Auth::logout');
    $routes->post('register', 'Auth::saveRegister');
});

$routes->group('admin', ['namespace' => 'App\Controllers', 'filter' => 'auth:Admin'], function ($routes) {
    // Dashboard
    $routes->add('dashboard', 'Dashboard::index');
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/pdf', 'Laporan::exPDF');
    // Satuan
    $routes->get('satuan', 'Satuan::index');
    $routes->get('satuan/tambah', 'Satuan::tambah');
    $routes->get('satuan/edit/(:num)', 'Satuan::edit/$1');
    $routes->post('satuan/save', 'Satuan::save');
    $routes->post('satuan/update', 'Satuan::update');
    $routes->get('satuan/delete/(:num)', 'Satuan::delete/$1');
    // Master Barang
    $routes->get('master-barang', 'MasterBarang::index');
    $routes->get('master-barang/tambah', 'MasterBarang::tambah');
    $routes->get('master-barang/edit/(:num)', 'MasterBarang::edit/$1');
    $routes->post('master-barang/save', 'MasterBarang::save');
    $routes->post('master-barang/update', 'MasterBarang::update');
    $routes->get('master-barang/delete/(:num)', 'MasterBarang::delete/$1');
    //Transaksi
    $routes->get('transaksi/barang-masuk', 'Transaksi\BarangMasuk::index');
    $routes->get('transaksi/barang-masuk/tambah', 'Transaksi\BarangMasuk::tambah');
    $routes->get('transaksi/barang-masuk/edit/(:num)', 'Transaksi\BarangMasuk::edit/$1');
    $routes->post('transaksi/barang-masuk/save', 'Transaksi\BarangMasuk::save');
    $routes->post('transaksi/barang-masuk/update', 'Transaksi\BarangMasuk::update');
    $routes->get('transaksi/barang-masuk/delete/(:num)', 'Transaksi\BarangMasuk::delete/$1');

    $routes->get('transaksi/barang-keluar', 'Transaksi\BarangKeluar::index');
    $routes->get('transaksi/barang-keluar/tambah', 'Transaksi\BarangKeluar::tambah');
    $routes->get('transaksi/barang-keluar/edit/(:num)', 'Transaksi\BarangKeluar::edit/$1');
    $routes->post('transaksi/barang-keluar/save', 'Transaksi\BarangKeluar::save');
    $routes->post('transaksi/barang-keluar/update', 'Transaksi\BarangKeluar::update');
    $routes->get('transaksi/barang-keluar/delete/(:num)', 'Transaksi\BarangKeluar::delete/$1');
    //Users
    $routes->get('users', 'Users::index');
    $routes->get('users/tambah', 'Users::tambah');
    $routes->get('users/edit/(:num)', 'Users::edit/$1');
    $routes->post('users/save', 'Users::save');
    $routes->post('users/update', 'Users::update');
    $routes->get('users/delete/(:num)', 'Users::delete/$1');
});

$routes->group('operator', ['namespace' => 'App\Controllers', 'filter' => 'auth:Operator'], function ($routes) {

    // Dashboard
    $routes->add('dashboard', 'Dashboard::index');
    $routes->get('laporan', 'Laporan::index');
    // Satuan
    $routes->get('satuan', 'Satuan::index');
    $routes->get('satuan/tambah', 'Satuan::tambah');
    $routes->get('satuan/edit/(:num)', 'Satuan::edit/$1');
    $routes->post('satuan/save', 'Satuan::save');
    $routes->post('satuan/update', 'Satuan::update');
    $routes->get('satuan/delete/(:num)', 'Satuan::delete/$1');
    //  Master Barang
    $routes->get('master-barang', 'MasterBarang::index');
    $routes->get('master-barang/tambah', 'MasterBarang::tambah');
    $routes->get('master-barang/edit/(:num)', 'MasterBarang::edit/$1');
    $routes->post('master-barang/save', 'MasterBarang::save');
    $routes->post('master-barang/update', 'MasterBarang::update');
    $routes->get('master-barang/delete/(:num)', 'MasterBarang::delete/$1');
    //Transaksi
    $routes->get('transaksi/barang-masuk', 'Transaksi\BarangMasuk::index');
    $routes->get('transaksi/barang-masuk/tambah', 'Transaksi\BarangMasuk::tambah');
    $routes->get('transaksi/barang-masuk/edit/(:num)', 'Transaksi\BarangMasuk::edit/$1');
    $routes->post('transaksi/barang-masuk/save', 'Transaksi\BarangMasuk::save');
    $routes->post('transaksi/barang-masuk/update', 'Transaksi\BarangMasuk::update');
    $routes->get('transaksi/barang-masuk/delete/(:num)', 'Transaksi\BarangMasuk::delete/$1');

    $routes->get('transaksi/barang-keluar', 'Transaksi\BarangKeluar::index');
    $routes->get('transaksi/barang-keluar/tambah', 'Transaksi\BarangKeluar::tambah');
    $routes->get('transaksi/barang-keluar/edit/(:num)', 'Transaksi\BarangKeluar::edit/$1');
    $routes->post('transaksi/barang-keluar/save', 'Transaksi\BarangKeluar::save');
    $routes->post('transaksi/barang-keluar/update', 'Transaksi\BarangKeluar::update');
    $routes->get('transaksi/barang-keluar/delete/(:num)', 'Transaksi\BarangKeluar::delete/$1');


});




