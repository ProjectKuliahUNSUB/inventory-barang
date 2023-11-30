<?php

use CodeIgniter\Router\RouteCollection;

// app/Config/Routes.php

// $routes->get('login', 'AuthController::login');
// $routes->get('logout', 'AuthController::logout');

// // Example routes for different controllers and actions
// $routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
//     $routes->get('dashboard', 'AdminController::dashboard');
//     // Add more routes for the admin section as needed
// });

// $routes->group('user', ['filter' => 'role:user'], function ($routes) {
//     $routes->get('dashboard', 'UserController::dashboard');
//     // Add more routes for the user section as needed
// });

// // Default route
// $routes->setDefaultController('Home');
$routes->get('/', 'Auth::index');


$routes->get('/login', 'Auth::index');

$routes->get('/dashboard', 'Dashboard::index');
// Master Barang
$routes->get('/master-barang/barang', 'MasterBarang\Barang::index');
$routes->get('/master-barang/barang/tambah', 'MasterBarang\Barang::tambah');
$routes->get('/master-barang/barang/edit', 'MasterBarang\Barang::edit');
$routes->get('/master-barang/barang/save', 'MasterBarang\Barang::save');
$routes->get('/master-barang/barang/update', 'MasterBarang\Barang::update');
$routes->get('/master-barang/barang/delete', 'MasterBarang\Barang::delete');


$routes->get('/master-barang/jenis', 'MasterBarang\Jenis::index');
$routes->get('/master-barang/jenis/tambah', 'MasterBarang\Jenis::tambah');
$routes->get('/master-barang/jenis/edit', 'MasterBarang\Jenis::edit');
$routes->get('/master-barang/jenis/save', 'MasterBarang\Jenis::save');
$routes->get('/master-barang/jenis/update', 'MasterBarang\Jenis::update');
$routes->get('/master-barang/jenis/delete', 'MasterBarang\Jenis::delete');


$routes->get('/master-barang/merk', 'MasterBarang\Merk::index');
$routes->get('/master-barang/merk/tambah', 'MasterBarang\Merk::tambah');
$routes->get('/master-barang/merk/edit', 'MasterBarang\Merk::edit');
$routes->get('/master-barang/merk/save', 'MasterBarang\Merk::save');
$routes->get('/master-barang/merk/update', 'MasterBarang\Merk::update');
$routes->get('/master-barang/merk/delete', 'MasterBarang\Merk::delete');


$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::index');
$routes->get('/master-barang/satuan/tambah', 'MasterBarang\Satuan::tambah');
$routes->get('/master-barang/satuan/edit', 'MasterBarang\Satuan::edit');
$routes->get('/master-barang/satuan/save', 'MasterBarang\Satuan::save');
$routes->get('/master-barang/satuan/update', 'MasterBarang\Satuan::update');
$routes->get('/master-barang/satuan/delete', 'MasterBarang\Satuan::delete');
//Customer
$routes->get('/customer', 'Customer::index');
$routes->get('/customer/tambah', 'Customer::tambah');
$routes->get('/customer/edit', 'Customer::edit');
$routes->get('/customer/save', 'Customer::save');
$routes->get('/customer/update', 'Customer::update');
$routes->get('/customer/delete', 'Customer::delete');
//Transaksi
$routes->get('/transaksi/barang-masuk', 'Transaksi\BarangMasuk::index');
$routes->get('/transaksi/barang-masuk/tambah', 'Transaksi\BarangMasuk::tambah');
$routes->get('/transaksi/barang-masuk/edit', 'Transaksi\BarangMasuk::edit');
$routes->get('/transaksi/barang-masuk/save', 'Transaksi\BarangMasuk::save');
$routes->get('/transaksi/barang-masuk/update', 'Transaksi\BarangMasuk::update');
$routes->get('/transaksi/barang-masuk/delete', 'Transaksi\BarangMasuk::delete');

$routes->get('/transaksi/barang-keluar', 'Transaksi\BarangKeluar::index');
$routes->get('/transaksi/barang-keluar/tambah', 'Transaksi\BarangKeluar::tambah');
$routes->get('/transaksi/barang-keluar/edit', 'Transaksi\BarangKeluar::edit');
$routes->get('/transaksi/barang-keluar/save', 'Transaksi\BarangKeluar::save');
$routes->get('/transaksi/barang-keluar/update', 'Transaksi\BarangKeluar::update');
$routes->get('/transaksi/barang-keluar/delete', 'Transaksi\BarangKeluar::delete');



