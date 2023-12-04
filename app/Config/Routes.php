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
$routes->get('/master-barang', 'MasterBarang::index');
$routes->get('/master-barang/tambah', 'MasterBarang::tambah');
$routes->get('/master-barang/edit', 'MasterBarang::edit');
$routes->get('/master-barang/save', 'MasterBarang::save');
$routes->get('/master-barang/update', 'MasterBarang::update');
$routes->get('/master-barang/delete', 'MasterBarang::delete');
//Users
$routes->get('/users', 'Users::index');
$routes->get('/users/tambah', 'Users::tambah');
$routes->get('/users/edit', 'Users::edit');
$routes->get('/users/save', 'Users::save');
$routes->get('/users/update', 'Users::update');
$routes->get('/users/delete', 'Users::delete');
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



