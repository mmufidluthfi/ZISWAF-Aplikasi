<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;
use DB;

class ContactusController extends Controller
{
    	
    public function simpan_pesan(Request $request)
    {

    	$kontakkita = $request->all();

    	$v = \Validator::make($request->all(),
    		[
    			'nama_lengkap' => 'required',
    			'email' => 'required',
    			'pesan' => 'required',
    		]);

    	if($v->fails())
    	{

    		return redirect()->back()->withErrors($v->errors());

    	} else {

            $datekontakkita = Carbon::now()->format('Y-m-d H:i:s');

    		$datakontakkita = array(
    				'nama_lengkap'   => $kontakkita['nama_lengkap'], 
    				'email'          => $kontakkita['email'], 
    				'pesan'          => $kontakkita['pesan'], 
    				'tanggal_pesan'  => $datekontakkita, 
    			);

            $i = DB::table('contactus')->insert($datakontakkita);

    		if ($i > 0) {
    			
                  \Session::flash('message-kontakkita', 'Pesan Berhasil Dikirim. Terima Kasih');
    		  
    		  return redirect('contact/');
              
    		} 
    		
    	}

    }



}
