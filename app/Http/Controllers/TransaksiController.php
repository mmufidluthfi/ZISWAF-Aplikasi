<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use DB;
use App\Pendanaan;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;


class TransaksiController extends Controller
{
    public function save_nominal(Request $request)
    {

    	$post = $request->all();

    	//var_dump($post);

        //$lastInsertID = transaksi::lastID($data);
        //var_dump($lastInsertID);

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

    		//$i = DB::table('transaksi')->insert($datatransaksi);

            $i = DB::table('transaksi')->insertGetId($datatransaksi);
            //$lastInsertedId= $datatransaksi->id_transaksi;
            //var_dump($i);

            //var_dump($lastInsertedId);

    		if ($i > 0) {
    			
    			$id_halamanpendanaan = $post['id_pendanaan'];
    			//$halamandonasipayment = echo "donasi-payment/$id_halamanpendanaan";
	    		  \Session::flash('message-nominal', $post['nominal']);
	    		  \Session::flash('message-idpendanaan', $id_halamanpendanaan);
	    		  \Session::flash('message-status', $post['status']);
                  \Session::flash('message-idtransaksi', $i);
    		  
    		  //return redirect()->back()->with($halamandonasipayment);
    		  //return redirect()->action('App\Http\Controllers\PendanaanController@getDonasiPayment', [1]);
    		  return redirect('donasi-payment/'); //masih error di redirect by id
    		} 
    		

    	}

    }

    public function upload(){

            

                if(Input::hasFile('file')){

                        $file = Input::file('file');
                        $file->move('transaksi', $file->getClientOriginalName());

                        var_dump($file);
                        //echo 'Uploaded';
                        //echo '<img src="transaksi/'. $file->getClientOriginalName().'"/>';
                        //var_dump($file);
                }

        }

}
