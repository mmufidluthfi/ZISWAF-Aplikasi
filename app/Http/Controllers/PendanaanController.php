<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendanaan;
use App\laporan;
use App\Http\Requests;

use DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use App\Users;
use App\userumkm;
use Session;

use Carbon\Carbon;

use Illuminate\Pagination\LengthAwarePaginator;

class PendanaanController extends Controller
{
    public function getAllPendanaan(){
    	$pendanaans  = DB::table('pendanaan')->paginate(4);
    	return view('home')->withPendanaans($pendanaans);
	}

	public function getAllPendanaans1(){
    	$pendanaans1  = DB::table('pendanaan')->paginate(6);
    	return view('pendanaan')->withPendanaans1($pendanaans1);
	}

	public function getPendanaan($id_pendanaan){
	    $pendanaan  = DB::table('pendanaan')
	    			->join('userumkm', 'pendanaan.id_umkm', '=', 'userumkm.id_umkm')
	    			->select('pendanaan.*', 'userumkm.nama_pj', 'userumkm.foto_pj')
	    			->where('pendanaan.id_pendanaan', '=', $id_pendanaan)
	    			->get();
	    
	    $laporan    = DB::table('laporan')->where('id_pendanaan', '=', $id_pendanaan)->get();
	    //return view('details-pendanaan')->withPendanaan($pendanaan);
	    return view('details-pendanaan',['pendanaan' => $pendanaan],['laporan' => $laporan]);
	}

	public function getKategoriPendanaan($kategori){	    
		$pendanaank = DB::table('pendanaan')->where('kategori', '=', $kategori)->paginate(6);
    	return view('kategori')->withPendanaank($pendanaank);
	}

	public function getDonasiPendanaan($id_pendanaan){	    
		$pendanaand  = Pendanaan::find($id_pendanaan);
    	return view('donasi')->withPendanaand($pendanaand);
	}

	//Dashboard Pendanaan
	public function getInformasiPendanaan($id){

		$pendanaantransaksi = DB::table('transaksi')
		            ->join('users', 'transaksi.id', '=', 'users.id')
		            ->join('pendanaan', 'transaksi.id_pendanaan', '=', 'pendanaan.id_pendanaan')
		            ->select('users.id', 'pendanaan.nama_proyek', 'pendanaan.kategori', 'transaksi.*')
		            ->where('transaksi.id', '=', $id)
		            ->orderBy('transaksi.id_transaksi', 'desc')
		            ->paginate(5);

	  	return view('dashboard.dashboard-pendanaan')->withPendanaantransaksi($pendanaantransaksi);
	    
	 }

	//Halaman Donasi Payment
	public function getDonasiPayment($id_pendanaan){	    
		$pendanaanpayment  = Pendanaan::find($id_pendanaan);
		$pendanaannominal = Session::get('message-nominal');
    	//return view('donasi-payment')->withPendanaanpayment($pendanaanpayment);
    	return view('donasi-payment',['pendanaanpayment' => $pendanaanpayment],['pendanaannominal' => $pendanaannominal]);
	}

	//Halaman Donasi Invoice
	public function getDonasiInvoice($id_pendanaan){	    
		$pendanaaninvoice  = Pendanaan::find($id_pendanaan);
		$pendanaannominal = Session::get('message-nominal');
    	//return view('donasi-invoice')->withPendanaaninvoice($pendanaaninvoice);
    	return view('donasi-invoice',['pendanaaninvoice' => $pendanaaninvoice],['pendanaannominal' => $pendanaannominal]); 
	}

	//Halaman Administrator Pendanaan
	public function getAllPendanaanAdmin(){
    	$pendanaanadmin  = DB::table('pendanaan')
					    	->join('userumkm', 'pendanaan.id_umkm', '=', 'userumkm.id_umkm')
					    	->select('pendanaan.*', 'userumkm.*')
					    	->orderBy('pendanaan.id_pendanaan', 'desc')
					    	->paginate(5);

    	// return view('administrator.administrator-listdonasi')->withPendanaanadmin($pendanaanadmin);
		return view('administrator.pendanaan')->withPendanaanadmin($pendanaanadmin);
	}

	public function uploadpendanaan(Request $request){

        if(Input::hasFile('file')){

                $postpendanaan = $request->all();

                $file       = Input::file('file');
                $file->move('images/proyek/', $file->getClientOriginalName());
				$namafileproyek = $file->getClientOriginalName();

                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');

                $postpendanaan = array(
                        'id_umkm'        => $postpendanaan['id_umkm'], 
                        'nama_proyek'    => $postpendanaan['nama_proyek'], 
                        'kategori'       => $postpendanaan['kategori'], 
                        'total_dana'     => $postpendanaan['total_dana'], 
                        'sementara_dana' => $postpendanaan['sementara_dana'], 
                        'deskripsi'      => $postpendanaan['deskripsi'], 
                        'foto_proyek'    => $namafileproyek,
                        'status'         => $postpendanaan['status'],  
                        'tgl_pendanaan'  => $dateimputpendanaan, 
                    );


            $i = DB::table('pendanaan')->insert($postpendanaan);

    		if ($i > 0) {
    		  	
    		  	//return redirect('administrator/listdonasi');
    		  	return redirect('administrator/pendanaan');
              
    		} 

        }

    }


}
