<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;

class BankController extends Controller
{
    
	public function getBankPendanaan($id){

		$userbankpendanaan  = DB::table('userbank')
					->join('users', 'userbank.lembagaID', '=', 'users.lembagaID')
					->where('users.id', '=', $id )
					->select('users.*','userbank.*')
                    ->get();

		$userumkmpendanaan  = DB::table('userumkm')
					->join('users', 'userumkm.lembagaID', '=', 'users.lembagaID')
					->where('users.id', '=', $id )
					->select('userumkm.*')
                    ->get();

         $tampilfundbank  = DB::table('fund_bank')
         		->join('userbank', 'fund_bank.id_bank', '=', 'userbank.id_bank')
         		->join('userumkm', 'fund_bank.id_umkm', '=', 'userumkm.id_umkm')
		    	// ->where('fund_bank.id_bank', '=', 'userbank.id_bank' )
		    	->where('fund_bank.id_lkm', '=', $id )
		    	->select('fund_bank.*', 'userbank.*', 'userumkm.*')
		    	->orderBy('fund_bank.id_pendanaan_bank', 'desc')
		    	->paginate(5);

    	 return view('lkm.dashboard-pendanaanusaha',['userumkmpendanaan' => $userumkmpendanaan],['userbankpendanaan' => $userbankpendanaan])->withTampilfundbank($tampilfundbank);
	}


	public function createPendanaanBank(Request $request){

		$postbank = $request->all();

		$v = \Validator::make($request->all(),
            [
                'id_user'       => 'required',
                'nama_proyek'   => 'required',
                'id_bank'       => 'required',
                'id_umkm'       => 'required',
                'total_dana'    => 'required',
                'tgl_pendanaan' => 'required',
            ]);

        if($v->fails())
        {
            \Session::flash('message-pesanerror', 'Submit Gagal, Silahkan Coba Submit Ulang');
            return redirect()->back()->withErrors($v->errors());

        } else {

	        $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');

                $postpendanaanbank = array(
                        'id_lkm'       	  => $postbank['id_user'], 
                        'nama_proyek'     => $postbank['nama_proyek'], 
                        'id_bank'         => $postbank['id_bank'], 
                        'id_umkm'         => $postbank['id_umkm'], 
                        'total_dana'      => $postbank['total_dana'], 
                        'tgl_pendanaan'   => $postbank['tgl_pendanaan'], 
                        'created_at'      => $dateimputpendanaan, 
                        'updated_at'      => $dateimputpendanaan, 
                    );


            $i = DB::table('fund_bank')->insert($postpendanaanbank);

    		if ($i > 0) {

    			$id_lkm_bank = $postbank['id_user'];
    		  	
    		  	\Session::flash('message-inputberhasil', 'Input Pendaftaran Pendanaan Berhasil, Silahkan Cek Menu Proyek');
    		  	//return redirect('administrator/listdonasi');
    		  	return redirect('lkm/dashboard-pendanaanusaha/'.$id_lkm_bank);
	              
	    	}	
   		}

    }

 //    public function getAllPendanaanBank($id){

 //    	$pendanaans  = DB::table('fund_bank')
	// 	    	->where('fund_bank.id_lkm', '=', $id )
	// 	    	->paginate(5);

 //    	return redirect('lkm/dashboard-pendanaanusaha/'.$id);
	// }

}
