<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function save_nominal(Request $request)
    {
    	$post = $request->all();
    	//var_dump($post);
    	$v = \Validator::make($request->all(),
    		[
    			'nominal' => 'required|integer',
    		]);
    	if($v->fails())
    	{
   			//$messages = [
			//     'nominal.required' => 'Opps!',
			// ];
    		return redirect()->back()->withErrors($v->errors());
    	} else {
    		//var_dump($post);
    		$datatransaksi = array(
    				'id'                => $post['id'], 
    				'id_pendanaan'      => $post['id_pendanaan'], 
    				'nominal'           => $post['nominal'], 
    				'konfirmasi'        => $post['konfirmasi'], 
    				'status'            => $post['status'], 
    				'tanggal_transaksi' => $post['tanggal_transaksi'], 
    			);

    		$i = DB::table('transaksi')->insert($datatransaksi);
    		if ($i > 0) {

    		  \Session::flash('message-nominal', $post['nominal']);
    		  return redirect('donasi-payment');
    		} 
    		

    	}



    }

}
