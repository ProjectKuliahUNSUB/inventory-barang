<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
// Master Barang
$routes->get('/master-barang/barang', 'MasterBarang\Barang::index');
$routes->get('/master-barang/jenis', 'MasterBarang\Jenis::index');
$routes->get('/master-barang/merk', 'MasterBarang\Merk::index');
$routes->get('/master-barang/satuan', 'MasterBarang\Satuan::index');
//Customer
$routes->get('/customer', 'Customer::index');



 

