<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class FundziswafController extends Controller
{

	public function getAlllkm($id){

		$userlkm  = DB::table('users')
		                    ->where('users.lembagaID', '=', $id )
		                    ->where('users.admin', '=', 2)
		                    ->get();

		$reportpendanaan  = DB::table('fund_ziswaf')
							->join('users', 'fund_ziswaf.id_lkm', '=', 'users.id')
							->join('userumkm', 'fund_ziswaf.id_umkm', '=', 'userumkm.id_umkm')
					    	->select('fund_ziswaf.*', 'users.name', 'userumkm.*')
					    	->where('fund_ziswaf.id_ziswaf', '=', $id )
					    	->where('users.admin', '=', 2 )
					    	->orderBy('fund_ziswaf.id_pendanaan_ziswaf', 'desc')
					    	->paginate(5);

		$userumkmpendanaan  = DB::table('userumkm')
		                    ->where('userumkm.lembagaID', '=', $id )
		                    ->get();

       return view('administrator.dana',['userlkm' => $userlkm], ['reportpendanaan' => $reportpendanaan])->withUserumkmpendanaan($userumkmpendanaan);

	}

    public function uploadtransaksipendanaan(Request $request){

		$postdana = $request->all();

		$v = \Validator::make($request->all(),
            [
                'id_lkm' => 'required',
                'nama_pendanaan' => 'required',
                'kategori' => 'required',
                'tgl_pendanaan' => 'required',
                'total_dana' => 'required',
                'id_umkm' => 'required',
            ]);

        if($v->fails())
        {
            \Session::flash('message-pesanerror', 'Submit Gagal, Silahkan Coba Submit Ulang');
            return redirect()->back()->withErrors($v->errors());

        } else {

	       // $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');

	                $postpendanaan = array(
	                		'id_ziswaf'      => $postdana['id_ziswaf'], 
	                        'id_lkm'         => $postdana['id_lkm'], 
	                        'nama_pendanaan' => $postdana['nama_pendanaan'], 
	                        'kategori'       => $postdana['kategori'], 
	                        'tgl_pendanaan'  => $postdana['tgl_pendanaan'],
	                        'total_dana'     => $postdana['total_dana'],
	                        'id_umkm'        => $postdana['id_umkm'],  
	                    );


	            $i = DB::table('fund_ziswaf')->insert($postpendanaan);

    		if ($i > 0) {

    		  	$id_transaksi = $postdana['id_ziswaf'];

    		  	\Session::flash('message-inputberhasil', 'Input Pendaftaran Pendanaan Berhasil, Silahkan Cek Menu Proyek');
    		  	//return redirect('administrator/listdonasi');
    		  	return redirect('administrator/dana/'.$id_transaksi);
              
	    		} 

   		}

    }

    public function getAlltransaksidana($id){

		$reportpendanaan  = DB::table('fund_ziswaf')
							->join('userumkm', 'fund_ziswaf.id_umkm', '=', 'userumkm.id_umkm')
					    	->select('fund_ziswaf.*', 'userumkm.*')
					    	->where('fund_ziswaf.id_lkm', '=', $id )
					    	->orderBy('fund_ziswaf.id_pendanaan_ziswaf', 'desc')
					    	->paginate(5);

       return view('lkm.dashboard-listpendanaanziswaf', ['reportpendanaan' => $reportpendanaan]);

	}

	public function updatestatusdanalkm(Request $request){

            $updatestatusdana = $request->all();

            $statustransaksi = array(
                            'id_pendanaan_ziswaf'   => $updatestatusdana['id_pendanaan_ziswaf'], 
                            'status'                => $updatestatusdana['status'], 
                        );

            DB::table('fund_ziswaf')->where('id_pendanaan_ziswaf', $updatestatusdana['id_pendanaan_ziswaf'])->update(['status' => $updatestatusdana['status']]);

            return redirect()->back();
    }

}
