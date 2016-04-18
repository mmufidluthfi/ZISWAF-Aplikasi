<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use DB;
use App\Pendanaan;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use Carbon\Carbon;


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

            $datetransaksi = Carbon::now()->format('Y-m-d H:i:s');

    		$datatransaksi = array(
    				'id'                => $post['id'], 
    				'id_pendanaan'      => $post['id_pendanaan'], 
    				'nominal'           => $post['nominal'], 
    				'konfirmasi'        => $post['konfirmasi'], 
    				'status'            => $post['status'], 
    				'tanggal_transaksi' => $datetransaksi, 
    			);

    		//$i = DB::table('transaksi')->insert($datatransaksi);

            //DB::table('transaksi')->insert(['tanggal_transaksi' => Carbon::now()->format('Y-m-d H:i:s');]);
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
    		  return redirect('donasi-payment/'.$id_halamanpendanaan); //masih error di redirect by id
    		} 
    		

    	}

    }

    public function upload(Request $request){

                if(Input::hasFile('file')){

                        $postgambar = $request->all();

                        $file = Input::file('file');
                        $file->move('transaksi', $file->getClientOriginalName());
                        $namafile = $file->getClientOriginalName();

                        $datatransaksiGambar = array(
                                'id_transaksi'      => $postgambar['id_transaksiDonasi'], 
                                'url_gambar'        => $namafile, 
                            );

                        $bukti_transaksiDonasi = DB::table('bukti_transaksi')->insert($datatransaksiGambar);

                        DB::table('transaksi')->where('id_transaksi', $postgambar['id_transaksiDonasi'])->update(['konfirmasi' => $namafile]);

                        \Session::flash('pesan-uploadsukses', 'Terima Kasih, Konfirmasi Pembayaran Sudah berhasil di Upload! <br/>Tim Admin Akan segera Memverifikasi Pendanaan Anda Segera. <br/>Silahkan melihat Halaman Pendanaan untuk mengetahui status pendanaan Anda');

                        return redirect('dashboard/home');

                }

        }

        public function uploadbukti(Request $request){

                if(Input::hasFile('file')){

                        $postgambar = $request->all();

                        $file = Input::file('file');
                        $file->move('transaksi', $file->getClientOriginalName());
                        $namafile = $file->getClientOriginalName();

                        $datatransaksiGambar = array(
                                'id_transaksi'      => $postgambar['id_transaksiDonasi'], 
                                'url_gambar'        => $namafile, 
                            );

                        $bukti_transaksiDonasi = DB::table('bukti_transaksi')->insert($datatransaksiGambar);

                        DB::table('transaksi')->where('id_transaksi', $postgambar['id_transaksiDonasi'])->update(['konfirmasi' => $namafile]);

                        \Session::flash('pesan-uploadsukses', 'Terima Kasih, Konfirmasi Pembayaran Sudah berhasil di Upload! <br/>Tim Admin Akan segera Memverifikasi Pendanaan Anda Segera. <br/>Silahkan melihat Halaman Pendanaan untuk mengetahui status pendanaan Anda');

                        return redirect('dashboard/home');

                }

        }

        public function getTransaksipendanaan(){

            $transaksipendanaan = DB::table('transaksi')
                        ->join('users', 'transaksi.id', '=', 'users.id')
                        ->join('pendanaan', 'transaksi.id_pendanaan', '=', 'pendanaan.id_pendanaan')
                        ->select('transaksi.id_transaksi', 'pendanaan.nama_proyek', 'pendanaan.kategori', 'users.name', 'transaksi.nominal', 'transaksi.konfirmasi', 'transaksi.status', 'transaksi.tanggal_transaksi')
                        ->orderBy('transaksi.id_transaksi', 'desc')
                        //->where('transaksi.id', '=', $id)
                        ->get();

            //var_dump($transaksipendanaan);
            return view('administrator.administrator-transaksidonasi')->withTransaksipendanaan($transaksipendanaan);
        
     }

      public function updatestatus(Request $request){

            $updatestatustransaksi = $request->all();

            $statustransaksi = array(
                            'id_transaksi'  => $updatestatustransaksi['id_transaksiDonasi'], 
                            'status'        => $updatestatustransaksi['editstatus'], 
                        );

            DB::table('transaksi')->where('id_transaksi', $updatestatustransaksi['id_transaksiDonasi'])->update(['status' => $updatestatustransaksi['editstatus']]);

            return redirect('administrator/transaksidonasi');
    }

}
