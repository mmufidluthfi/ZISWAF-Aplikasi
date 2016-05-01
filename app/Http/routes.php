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

Route::group(['middleware' => 'web'], function () {
	Route::auth();
});

Route::group(['middleware' => ['web','auth']], function()
{
	Route::get('/home', 'HomeController@index');

	Route::get('/',function(){
		if(Auth::user()->admin == 1) {
			return view('administrator.administrator-home');
		} elseif (Auth::user()->admin == 0){
			return view('dashboard.dashboard-home');
		} elseif (Auth::user()->admin == 2){
			return view('lkm.dashboard-home');
		} else {
			return view('login');
		}

	});
});


// Route::get('admin', ['middleware' => ['web', 'auth', 'admin'], function(){
// 	return view('administrator/administrator-home');
// }]);


//Halaman Welcome
// Route::get('/welcome', 'HomeController@index');

//Pendanaan (Halaman Utama)
Route::get('/', 'PendanaanController@getAllPendanaan');

//Pendanaan (Halaman List Pendanaan)
Route::get('/pendanaan', 'PendanaanController@getAllPendanaans1');

//Pendanaan (Halaman Detail Pendanaan)
Route::get('/details-pendanaan/{id_pendanaan}', 'PendanaanController@getPendanaan');

Route::post('uploadbukti', 'TransaksiController@uploadbukti');

//Pendanaan (Halaman Berdasarkan Kategori)
Route::get('/kategori/{kategori}', 'PendanaanController@getKategoriPendanaan');

//Halaman Donasi by ID
Route::get('/donasi/{id_pendanaan}', 'PendanaanController@getDonasiPendanaan');
Route::post('save_nominal','TransaksiController@save_nominal');

//Halaman Donasi by Payment
Route::get('/donasi-payment/{id_pendanaan}', 'PendanaanController@getDonasiPayment');

Route::post('upload', 'TransaksiController@upload');

//Halaman Donasi by Invoice
Route::get('/donasi-invoice/{id_pendanaan}', 'PendanaanController@getDonasiInvoice');

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

Route::post('editpassword', 'UsersController@editpassword');
Route::post('uploadfoto', 'UsersController@uploadfoto');

//Administrator
// Route::get('/administrator/home', function () {
//     return view('administrator.administrator-home');
// });

Route::get('/administrator/home/{id}', 'RekeningbankController@getAllRekeningBank');

Route::post('updatebank', 'RekeningbankController@updatebank');

//Administrator Transaksi Donasi
// Route::get('/administrator/transaksidonasi', 'TransaksiController@getTransaksipendanaan');

// Route::post('updatestatus', 'TransaksiController@updatestatus');

Route::get('/administrator/pendanaan/{id}', 'PendanaanController@getAllPendanaanAdmin');

Route::get('/administrator/submitdonasi', function () {
    return view('administrator.administrator-submitdonasi');
});

// Route::get('/administrator/pendanaan', function () {
//     return view('administrator.pendanaan');
// });

Route::post('uploadpendanaan', 'PendanaanController@uploadpendanaan');

//Administrator User UMKM
Route::get('/administrator/umkm/{id}', 'UserumkmController@getUserumkm');


//Administrator UMKM
Route::get('/administrator/submitumkm', function () {
    return view('administrator.administrator-submitumkm');
});

Route::post('uploadumkm', 'UserumkmController@uploadumkm');


// Route::get('/administrator/verifikasi', function () {
//     return view('administrator.verifikasi');
// });

Route::get('/administrator/verifikasi/{id}', 'TransaksiController@getTransaksipendanaan');

Route::post('updatestatus', 'TransaksiController@updatestatus');


// Route::get('/administrator/manageuser', function () {
//     return view('administrator.manageuser');
// });

Route::get('/administrator/manageuser/{id}', 'UsersController@getAllInfo');


// Route::get('/administrator/dana', function () {
//     return view('administrator.dana');
// });

Route::get('/administrator/dana/{id}', 'FundziswafController@getAlllkm');
Route::post('uploadtransaksipendanaan','FundziswafController@uploadtransaksipendanaan');



Route::post('input_lkm','UsersController@input_lkm');

Route::post('input_bank','UsersController@input_bank');


//LKM Route
Route::get('/lkm/home', function () {
    return view('lkm.dashboard-home');
});


Route::get('/lkm/listcrowd/{id}', 'LkmcrowdController@getAllPendanaanLkmCrowd');

Route::get('/lkm/laporancrowd/{id}', 'LkmcrowdController@listReportCrowd');

Route::post('createLaporanCrowd','LkmcrowdController@createLaporanCrowd');

Route::get('/lkm/detail_laporan_crowdfunding/{id}','LkmcrowdController@detailReport');



Route::post('/uploaddetaillaporan','LkmcrowdController@uploaddetaillaporan');

Route::get('/lkm/dashboard-listpendanaanziswaf/{id}', 'FundziswafController@getAlltransaksidana');

Route::post('updatestatusdanalkm', 'FundziswafController@updatestatusdanalkm');

Route::get('/lkm/dashboard-reportpendanaanziswaf/{id}','ZiswafController@listReportZiswaf');

Route::get('/lkm/detail_laporan_ziswaf/{id}','ZiswafController@detailReport');

Route::post('/uploaddetaillaporanziswaf','ZiswafController@uploaddetaillaporan');

Route::post('createLaporanZiswaf','ZiswafController@createLaporanZiswaf');

Route::get('/lkm/dashboard-pendanaanusaha/{id}','BankController@getBankPendanaan');

Route::post('createPendanaanBank','BankController@createPendanaanBank');

