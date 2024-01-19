<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/info', 'Home::info');

$routes->get('/cici ', 'Home::cici ');

$routes->get('/admin','Admin::index');



// Router untuk produk

$routes->get('/product','Product::index');

$routes->get('/product/insert','Product::Insert::index');

$routes->get('/product/insert','Product::Insert');

// Router untuk category
$routes->get('/category','Category::index');

//Blog
$routes->get('/post','Post::index');
$routes->get('/post/insert','Post::insert');
$routes->get('/post/save','Post::save');

//Melewatkan parameter di route

//$routes->get('/post/(:any)','Post::post/$1');

$routes->get('/post/(:num)/comment/(:num)','Post::comment/$1/$2');

$routes->get('/cart/(:num)/product/(:num)','Cart::product/$1/$2');

//admin
$routes->get('/admin','Admin::index');

//CRUD Product
$routes->get('admin/product','Product::index');
$routes->get('admin/product/create','Product::create',['as'=>'product.create']);
$routes->post('admin/product/store','Product::store');
$routes->get('admin/product/edit/(:num)','Product::edit/$1');
$routes->post('admin/product/update/(:num)','Product::update/$1');
$routes->get('admin/product/delete/(:num)','Product::delete/$1');
$routes->get('admin/product/find/(:num)','Product::find/$1');

//data training
$routes->get('/dataset','training::index');


//login
$routes->get('/', 'Home::index',['filter'=>'auth']);
$routes->get('/profil', 'Home::lihatprofil');
$routes->get('/login', 'Auth::index');
$routes->post('/proses-login', 'Auth::proseslogin/admin');
$routes->get('/logout', 'Auth::logout');