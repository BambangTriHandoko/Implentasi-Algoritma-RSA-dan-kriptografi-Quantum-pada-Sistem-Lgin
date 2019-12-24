<?php

Route::get('/', 'AuthController@index');

// Dashboard
Route::get('/dashboard', 'DashboardController@index');

// Route CRUD Users
Route::get('/users', 'UsersController@index');

Route::get('/users/tambah', 'UsersController@tambah');
Route::post('/users/tambah_proses','UsersController@tambah_proses');

Route::get('/users/hapus/{id}','UsersController@hapus');

Route::get('/users/edit/{id}','UsersController@edit');
Route::post('/users/edit_proses','UsersController@edit_proses');

// Route CRUD Purchase Order
Route::get('/purchase_order', 'PurchaseOrderController@index');

Route::get('/purchase_order/tambah', 'PurchaseOrderController@tambah');
Route::post('/purchase_order/tambah_proses','PurchaseOrderController@tambah_proses');

Route::get('/purchase_order/hapus/{id}','PurchaseOrderController@hapus');

Route::get('/purchase_order/edit/{id}','PurchaseOrderController@edit');
Route::put('/purchase_order/edit_proses/{id}', 'PurchaseOrderController@edit_proses');

// Route CRUD Pembayaran
Route::get('/pembayaran', 'PembayaranController@index');

Route::get('/pembayaran/tambah', 'PembayaranController@tambah');
Route::post('/pembayaran/tambah_proses','PembayaranController@tambah_proses');

Route::get('/pembayaran/hapus/{id}','PembayaranController@hapus');

Route::get('/pembayaran/edit/{id}','PembayaranController@edit');
Route::put('/pembayaran/edit_proses/{id}', 'PembayaranController@edit_proses');

// Route Laporan
Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/export', 'LaporanController@export');

Route::get('/laporan/export_pdf', 'LaporanController@cetak_pdf');

// AUTH
Route::get('/authi/login', 'AuthController@index');
Route::get('/authi/logout', 'AuthController@logout');
Route::post('/authi/login', 'AuthController@auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
