<?php

use CodeIgniter\Router\RouteCollection;

// app/Config/Routes.php
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
    // Add your Admin routes here
    $routes->add('dashboard', 'Dashboard::index');
    // // Master Barang
    $routes->get('master-barang', 'MasterBarang::index');
    $routes->get('master-barang/tambah', 'MasterBarang::tambah');
    $routes->get('master-barang/edit', 'MasterBarang::edit');
    $routes->get('master-barang/save', 'MasterBarang::save');
    $routes->get('master-barang/update', 'MasterBarang::update');
    $routes->get('master-barang/delete', 'MasterBarang::delete');
    //Users
    $routes->get('users', 'Users::index');
    $routes->get('users/tambah', 'Users::tambah');
    $routes->get('users/edit/(:num)', 'Users::edit/$1');
    $routes->post('users/save', 'Users::save');
    $routes->post('users/update', 'Users::update');
    $routes->get('users/delete/(:num)', 'Users::delete/$1');
    //Transaksi
    $routes->get('transaksi/barang-masuk', 'Transaksi\BarangMasuk::index');
    $routes->get('transaksi/barang-masuk/tambah', 'Transaksi\BarangMasuk::tambah');
    $routes->get('transaksi/barang-masuk/edit', 'Transaksi\BarangMasuk::edit');
    $routes->get('transaksi/barang-masuk/save', 'Transaksi\BarangMasuk::save');
    $routes->get('transaksi/barang-masuk/update', 'Transaksi\BarangMasuk::update');
    $routes->get('transaksi/barang-masuk/delete', 'Transaksi\BarangMasuk::delete');

    $routes->get('transaksi/barang-keluar', 'Transaksi\BarangKeluar::index');
    $routes->get('transaksi/barang-keluar/tambah', 'Transaksi\BarangKeluar::tambah');
    $routes->get('transaksi/barang-keluar/edit', 'Transaksi\BarangKeluar::edit');
    $routes->get('transaksi/barang-keluar/save', 'Transaksi\BarangKeluar::save');
    $routes->get('transaksi/barang-keluar/update', 'Transaksi\BarangKeluar::update');
    $routes->get('transaksi/barang-keluar/delete', 'Transaksi\BarangKeluar::delete');
});

$routes->group('operator', ['namespace' => 'App\Controllers', 'filter' => 'auth:Operator'], function ($routes) {
    // Add your Operator routes here
    $routes->add('dashboard', 'Dashboard::index');
    // // Master Barang

});


// // Default route
// $routes->setDefaultController('Home');
// $routes->get('/', 'Auth::index');


// $routes->get('/login', 'Auth::index');

// $routes->get('/dashboard', 'Dashboard::index');




