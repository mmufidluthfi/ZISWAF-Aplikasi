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

Route::get('/', 'PendanaanController@getAllPendanaan');

Route::auth();

//Halaman Welcome
Route::get('/welcome', 'HomeController@index');


Route::get('/pendanaan', 'PendanaanController@getAllPendanaans1');

//Halaman Detail Pendanaan
Route::get('/details-pendanaan/{id_pendanaan}', 'PendanaanController@getPendanaan');

//Halaman Berdasarkan Kategori
Route::get('/kategori/{kategori}', 'PendanaanController@getKategoriPendanaan');


//Halaman Pendanaan
Route::get('/donasi', function () {
    return view('donasi');
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
