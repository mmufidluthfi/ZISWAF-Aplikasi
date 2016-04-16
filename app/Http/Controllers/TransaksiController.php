<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use DB;
use App\Pendanaan;

use App\Http\Requests;
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
    			
    			$id_halamanpendanaan = $post['id_pendanaan'];
    			//$halamandonasipayment = echo "donasi-payment/$id_halamanpendanaan";
	    		  \Session::flash('message-nominal', $post['nominal']);
	    		  \Session::flash('message-idpendanaan', $id_halamanpendanaan);
    		  
    		  //return redirect()->back()->with($halamandonasipayment);
    		  //return redirect()->action('App\Http\Controllers\PendanaanController@getDonasiPayment', [1]);
    		  return redirect('donasi-payment/');
    		} 
    		

    	}



    }

}
