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

    	$v = \Validator::make($request->all(),
    		[
    			'nominal' => 'required|integer',
    		]);

    	if($v->fails())
    	{

    		return redirect()->back()->withErrors($v->errors());

    	} else {

            $datetransaksi = Carbon::now()->format('Y-m-d H:i:s');

    		$datatransaksi = array(
    				'id'                => $post['id'], 
    				'id_pendanaan'      => $post['id_pendanaan'], 
    				'nominal'           => $post['nominal'], 
    				'konfirmasi'        => $post['konfirmasi'], 
    				'status'            => $post['status'], 
    				'tanggal_transaksi' => $datetransaksi, 
    			);

            $i = DB::table('transaksi')->insertGetId($datatransaksi);

    		if ($i > 0) {
    			
    			$id_halamanpendanaan = $post['id_pendanaan'];
    			
	    		  \Session::flash('message-nominal', $post['nominal']);
	    		  \Session::flash('message-idpendanaan', $id_halamanpendanaan);
	    		  \Session::flash('message-status', $post['status']);
                  \Session::flash('message-idtransaksi', $i);
    		  
    		  return redirect('donasi-payment/'.$id_halamanpendanaan);
              
    		} 
    		
    	}

    }

    public function upload(Request $request){

            $postgambar = $request->all();

            $v = \Validator::make($request->all(),
                [
                    'file' => 'required',
                ]);

            if($v->fails())
            {

                \Session::flash('message-uploadgagal', 'Upload File Gagal, Pastikan file dalam bentuk foto dan sudah dipilih');
                \Session::flash('message-nominal', $postgambar['nominal']);
                return redirect()->back()->withErrors($v->errors());

            } else {

                if(Input::hasFile('file')){

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

        }

        public function uploadbukti(Request $request){

                $postgambar = $request->all();

                $v = \Validator::make($request->all(),
                    [
                        'file' => 'required',
                    ]);

                if($v->fails())
                {
                    \Session::flash('message-uploadgagal', 'Upload File Gagal, Pastikan file dalam bentuk foto dan sudah dipilih');
                    return redirect()->back()->withErrors($v->errors());

                } else {

                if(Input::hasFile('file')){

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

        }

        public function getTransaksipendanaan($id){

            $transaksipendanaan = DB::table('transaksi')
                        ->join('users', 'transaksi.id', '=', 'users.id')
                        ->join('pendanaan', 'transaksi.id_pendanaan', '=', 'pendanaan.id_pendanaan')
                        ->join('userumkm', 'pendanaan.id_umkm', '=', 'userumkm.id_umkm')
                        ->select('transaksi.id_transaksi', 'pendanaan.id_pendanaan', 'pendanaan.nama_proyek', 'pendanaan.kategori', 'users.name', 'transaksi.nominal', 'transaksi.konfirmasi', 'transaksi.status', 'transaksi.tanggal_transaksi', 'userumkm.lembagaID')
                        ->where('userumkm.lembagaID', '=', $id)
                        ->orderBy('transaksi.id_transaksi', 'desc')
                        ->paginate(5);

            // return view('administrator.administrator-transaksidonasi')->withTransaksipendanaan($transaksipendanaan);
                        return view('administrator.verifikasi')->withTransaksipendanaan($transaksipendanaan);
        
     }

      public function updatestatus(Request $request){

            $updatestatustransaksi = $request->all();

            $statustransaksi = array(
                            'lembagaID'     => $updatestatustransaksi['lembagaID'], 
                            'id_pendanaan'  => $updatestatustransaksi['id_pendanaanDonasi'], 
                            'nominal'       => $updatestatustransaksi['nominal_pendanaanDonasi'], 
                            'id_transaksi'  => $updatestatustransaksi['id_transaksiDonasi'], 
                            'status'        => $updatestatustransaksi['editstatus'], 
                        );

            $pendanaanupdate = DB::table('pendanaan')
                ->where('id_pendanaan', '=', $updatestatustransaksi['id_pendanaanDonasi'])
                ->select('sementara_dana')
                ->get();

            foreach ($pendanaanupdate as $pdu) {
                $intpendanaanupdate = (int)$pdu->sementara_dana;
                $intdatatransaksinominal = (int)$updatestatustransaksi['nominal_pendanaanDonasi'];
                
                    $updatedana = $intpendanaanupdate + $intdatatransaksinominal;

                    DB::table('pendanaan')->where('id_pendanaan', $updatestatustransaksi['id_pendanaanDonasi'])->update(['sementara_dana' => $updatedana]);

            }

            DB::table('transaksi')->where('id_transaksi', $updatestatustransaksi['id_transaksiDonasi'])->update(['status' => $updatestatustransaksi['editstatus']]);

            $id_lembaga = $updatestatustransaksi['lembagaID'];

            \Session::flash('message-inputberhasil', 'Status Berhasil di-Update');
            // return redirect('administrator/transaksidonasi');
            return redirect('administrator/verifikasi/'.$id_lembaga);
    }

}
