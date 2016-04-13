<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendanaan;
use App\Http\Requests;

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
	    $pendanaank  = Pendanaan::find($kategori);
    	return view('kategori')->withPendanaank($pendanaank);
	}

	// public function getPendanaanKategori($kategori){
	//     $pendanaankategori  = Pendanaan::find($kategori);
	//     return view('details-pendanaan')->withPendanaankategori($pendanaankategori);
	// }
	
}
