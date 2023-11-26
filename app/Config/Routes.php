<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
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


$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::index');
$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::tambah');
$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::edit');
$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::save');
$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::update');
$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::delete');
//Customer
$routes->get('/customer', 'Customer::index');
//Transaksi
$routes->get('/transaksi/barang-masuk', 'Transaksi\BarangMasuk::index');
$routes->get('/transaksi/barang-keluar', 'Transaksi\BarangKeluar::index');



