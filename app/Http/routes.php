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
Route::get('/donasi', function () {
    return view('donasi');
});

//Halaman Pembayaran Donasi
Route::get('/donasi-payment', function () {
    return view('donasi-payment');
});

//Halaman Invoice Donasi
Route::get('/donasi-invoice', function () {
    return view('donasi-invoice');
});

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
