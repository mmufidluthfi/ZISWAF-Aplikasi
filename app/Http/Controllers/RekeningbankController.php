<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class RekeningbankController extends Controller
{
 	public function getAllRekeningBank($id){
    	$rekeningbank  = DB::table('rekeningbank')
				    	->where('rekeningbank.lembagaID', '=', $id)
				    	->get();

    	return view('administrator.administrator-home')->withRekeningbank($rekeningbank);
	}

	public function getRekeningBank($id){
    	$rekeningbanklembaga  = DB::table('rekeningbank')
    					->join('userumkm', 'rekeningbank.lembagaID', '=', 'userumkm.lembagaID')
    					->join('pendanaan', 'pendanaan.id_umkm', '=', 'userumkm.id_umkm')
    					->select('rekeningbank.*', 'userumkm.*', 'pendanaan.*')
				    	->where('pendanaan.id_pendanaan', '=', $id)
				    	->get();

    	return view('donasi-payment')->withRekeningbanklembaga($rekeningbanklembaga);
	}

	public function updatebank(Request $request){

            $rekeningbanklembaga = $request->all();

            $rekeninglembaga = array(
                            'namarekening1'      => $rekeningbanklembaga['namarekening1'], 
                            'nomorrekening1'     => $rekeningbanklembaga['nomorrekening1'], 
                            'namarekening2'      => $rekeningbanklembaga['namarekening2'], 
                            'nomorrekening2'     => $rekeningbanklembaga['nomorrekening2'], 
                            'namarekening3'      => $rekeningbanklembaga['namarekening3'], 
                            'nomorrekening3'     => $rekeningbanklembaga['nomorrekening3'], 
                            'namarekening4'      => $rekeningbanklembaga['namarekening4'], 
                            'nomorrekening4'     => $rekeningbanklembaga['nomorrekening4'], 
                        );


           DB::table('rekeningbank')->where('lembagaID', $rekeningbanklembaga['lembagaID'])
           					->update($rekeninglembaga);


            $id_lembaga = $rekeningbanklembaga['lembagaID'];

            \Session::flash('message-updateberhasil', 'Update Bank Berhasil');
            // return redirect('administrator/transaksidonasi');
            return redirect('administrator/home/'.$id_lembaga);
    }

}
