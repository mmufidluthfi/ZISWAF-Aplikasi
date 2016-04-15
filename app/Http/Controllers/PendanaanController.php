<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendanaan;
use App\Http\Requests;

use DB;
use App\Http\Controllers\Controller;

use App\Users;

class PendanaanController extends Controller
{
    public function getAllPendanaan(){
    	$pendanaans  = Pendanaan::all();
    	return view('home')->withPendanaans($pendanaans);
	}

	public function getAllPendanaans1(){
    	$pendanaans1  = Pendanaan::all();
    	return view('pendanaan')->withPendanaans1($pendanaans1);
	}

	public function getPendanaan($id_pendanaan){
	    $pendanaan  = Pendanaan::find($id_pendanaan);
	    return view('details-pendanaan')->withPendanaan($pendanaan);
	}

	public function getKategoriPendanaan($kategori){	    
		$pendanaank = DB::table('pendanaan')->where('kategori', '=', $kategori)->get();
    	return view('kategori')->withPendanaank($pendanaank);
	}

	public function getDonasiPendanaan($id_pendanaan){	    
		$pendanaand  = Pendanaan::find($id_pendanaan);
    	return view('donasi')->withPendanaand($pendanaand);
	}

	//Dashboard Pendanaan
	 public function getInformasiPendanaan($id){
	  $usertransaksi = DB::table('users')->where('id', '=', $id)->get();
	  $infotransaksi = DB::table('transaksi')->where('id', '=', $id)->get();

	  $pendanaantransaksi = DB::table('pendanaan')->where('id_pendanaan', '=', $infotransaksi[0]->id_pendanaan)->get();
	  // var_dump($pendanaantransaksi);
	  return view('dashboard.dashboard-pendanaan')->withPendanaanTransaksi($pendanaantransaksi);  
	 }

}
