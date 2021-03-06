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

Route::post('daftarlembaga', 'UsersController@daftarlembaga');

Route::get('/superadmin/superadmin', 'UsersController@getAllLembagaBank');

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

Route::post('simpan_pesan', 'ContactusController@simpan_pesan');


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

Route::post('updatestatusumkm', 'UserumkmController@updatestatusumkm');


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

Route::post('input_umkm','UsersController@input_umkm');

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

// Route::get('/lkm/dashboard-reportpendanaanbank', function () {
//     return view('lkm.dashboard-reportpendanaanbank');
// });

Route::get('/lkm/dashboard-reportpendanaanbank/{id}','BankController@listReportBank');

Route::post('createLaporanBank','BankController@createLaporanBank');

Route::get('/lkm/dashboard-detailreportpendanaanbank/{id}','BankController@detailReportBank');

Route::post('uploaddetaillaporanbank','BankController@uploaddetaillaporanbank');

Route::post('updatestatusbank', 'BankController@updatestatusbank');


//LKM Route
// Route::get('/bank/home', function () {
//     return view('bank.bank-home');
// });

Route::get('/bank/home/','BankController@getIDBank');

Route::get('/bank/pendanaan/{id}','BankController@getAllPendanaanBank');

Route::get('/bank/details/{id}','BankController@getAllPendanaanBankDetails');

Route::post('uploadinvoicebank', 'BankController@uploadinvoicebank');

Route::post('uploadinvoicereject', 'BankController@uploadinvoicereject');


//HAPUS FUNCTION
Route::post('hapuslkm', 'UsersController@hapuslkm');

Route::post('hapusbank', 'UsersController@hapusbank');


//PERSON
Route::get('/person/dashboard', function () {
    return view('person.dashboard');
});

//REPORT
// Route::get('/report/dashboard', function () {
//     return view('report.dashboard');
// });

Route::get('/report/forecast', function () {
    $banks = DB::select('SELECT CONCAT("\'", name, "\'") AS name, COUNT(*) AS count FROM users JOIN pendanaan_bank ON users.id = pendanaan_bank.id_person GROUP BY id');

    return view('report.forecast', [
        'banks' => collect($banks)
    ]);
});

Route::get('/report/data-browser/','mmsreportController@getdatabrowser');

Route::get('/report/dashboard/','mmsreportController@getdatadahsboardPendanaan');
