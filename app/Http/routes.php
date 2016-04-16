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

//Halaman Utama
// Route::get('/', function () {
//     return view('home');
// });

Route::auth();

//Halaman Welcome
Route::get('/welcome', 'HomeController@index');


Route::get('/', 'PendanaanController@getAllPendanaan');

Route::get('/pendanaan', 'PendanaanController@getAllPendanaans1');

//Halaman Detail Pendanaan
Route::get('/details-pendanaan/{id_pendanaan}', 'PendanaanController@getPendanaan');

//Halaman Berdasarkan Kategori
Route::get('/kategori/{kategori}', 'PendanaanController@getKategoriPendanaan');

//Halaman Pendanaan
// Route::get('/donasi', function () {
//     return view('donasi');
// });

Route::get('/donasi/{id_pendanaan}', 'PendanaanController@getDonasiPendanaan');

Route::get('/donasi-payment/{id_pendanaan}', 'PendanaanController@getDonasiPayment');

Route::get('/donasi-invoice/{id_pendanaan}', 'PendanaanController@getDonasiInvoice');

// Route::get('/donasi/{id_pendanaan}', 'PendanaanController@index');


//Halaman Pembayaran Donasi
// Route::get('/donasi-payment', function () {
//     return view('donasi-payment');
// });

//Halaman Invoice Donasi
// Route::get('/donasi-invoice', function () {
//     return view('donasi-invoice');
// });

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
// Route::get('/dashboard/pendanaan', function () {
//     return view('dashboard.dashboard-pendanaan');
// });

Route::get('/dashboard/pendanaan/{id}', 'PendanaanController@getInformasiPendanaan');

Route::get('/dashboard/laporan/{id}', 'PendanaanController@getInformasiLaporan');


//Dashboard Laporan
// Route::get('/dashboard/laporan', function () {
//     return view('dashboard.dashboard-laporan');
// });

//Dashboard Edit Profile
Route::get('/dashboard/edit-profile', function () {
    return view('dashboard.dashboard-editprofile');
});

//Dashboard Edit Foto
Route::get('/dashboard/edit-foto', function () {
    return view('dashboard.dashboard-editfoto');
});

//Dashboard Edit Password
Route::get('/dashboard/edit-password', function () {
    return view('dashboard.dashboard-editpassword');
});


Route::post('save_nominal','TransaksiController@save_nominal');

