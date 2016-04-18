<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

//Halaman Welcome
Route::get('/welcome', 'HomeController@index');

//Pendanaan (Halaman Utama)
Route::get('/', 'PendanaanController@getAllPendanaan');

//Pendanaan (Halaman List Pendanaan)
Route::get('/pendanaan', 'PendanaanController@getAllPendanaans1');

//Pendanaan (Halaman Detail Pendanaan)
Route::get('/details-pendanaan/{id_pendanaan}', 'PendanaanController@getPendanaan');
//Route::get('/details-pendanaan/{id_pendanaan}', 'LaporanController@getLaporan');


//Pendanaan (Halaman Berdasarkan Kategori)
Route::get('/kategori/{kategori}', 'PendanaanController@getKategoriPendanaan');

//Halaman Donasi
//Halaman Donasi by ID
Route::get('/donasi/{id_pendanaan}', 'PendanaanController@getDonasiPendanaan');
Route::post('save_nominal','TransaksiController@save_nominal');

//Halaman Donasi by Payment
Route::get('/donasi-payment/{id_pendanaan}', 'PendanaanController@getDonasiPayment');
Route::post('upload', 'TransaksiController@upload');

//Halaman Donasi by Invoice
Route::get('/donasi-invoice/{id_pendanaan}', 'PendanaanController@getDonasiInvoice');


//Another Page

//Halaman About
Route::get('/about', function () {
    return view('about');
});

//Halaman FAQ
Route::get('/faq', function () {
    return view('faq');
});

//Halaman TOS
Route::get('/tos', function () {
    return view('tos');
});

//Halaman Contact Us
Route::get('/contact', function () {
    return view('contact');
});

//DASHBOARD
//Dashboard Home
Route::get('/dashboard/home', function () {
    return view('dashboard.dashboard-home');
});

//Dashboard Pendanaan
Route::get('/dashboard/pendanaan/{id}', 'PendanaanController@getInformasiPendanaan');

//Dashboard Laporan
Route::get('/dashboard/laporan/{id}', 'LaporanController@getInformasiLaporan');

//Dashboard Pengaturan
Route::get('/dashboard/pengaturan', function () {
    return view('dashboard.dashboard-pengaturan');
});

Route::post('uploadfoto', 'UsersController@uploadfoto');

//Administrator
Route::get('/administrator/home', function () {
    return view('administrator.administrator-home');
});

//Administrator Transaksi Donasi
Route::get('/administrator/transaksidonasi', 'TransaksiController@getTransaksipendanaan');

// Route::get('/administrator/transaksidonasi', function () {
//     return view('administrator.administrator-transaksidonasi');
// });



Route::get('/administrator/listdonasi', function () {
    return view('administrator.administrator-listdonasi');
});

Route::get('/administrator/submitdonasi', function () {
    return view('administrator.administrator-submitdonasi');
});

