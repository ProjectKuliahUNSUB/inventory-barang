<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/master-barang/barang', 'Barang::index');
$routes->get('/master-barang/jenis', 'Jenis::index');
$routes->get('/master-barang/merk', 'Merk::index');
$routes->get('/master-barang/satuan', 'Satuan::index');


 

