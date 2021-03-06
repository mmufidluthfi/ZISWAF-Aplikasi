<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;

use Auth;

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

    public function updatestatusbank(Request $request){

                $updatestatusbankadmin = $request->all();

                $v = \Validator::make($request->all(),
                    [
                        'status' => 'required',
                    ]);

                if($v->fails())
                {
                    \Session::flash('message-inputberhasil', 'Update Gagal, Silahkan update kembali');
                    return redirect()->back()->withErrors($v->errors());

                } else {

                    $statustransaksibank = array(
                            'lembagaID'          => $updatestatusbankadmin['lembagaID'], 
                            'id_pendanaan_bank'  => $updatestatusbankadmin['id_pendanaan_bank'], 
                            'status'             => $updatestatusbankadmin['status'], 
                        );

                    DB::table('fund_bank')->where('id_pendanaan_bank', $updatestatusbankadmin['id_pendanaan_bank'])->update(['status' => $updatestatusbankadmin['status']]);

                    // var_dump($statustransaksibank);
                    $id_lembaga = $updatestatusbankadmin['lembagaID'];

                    \Session::flash('message-inputberhasil', 'Status Pendanaan Bank Berhasil di-Update');

                    return redirect('administrator/verifikasi/'.$id_lembaga);
            }

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


    public function listReportBank(Request $request, $id){
        $result = DB::table('laporan_bank')
                    ->join('fund_bank', 'fund_bank.id_pendanaan_bank', '=', 'laporan_bank.id_pendanaan_bank')
                    ->select('fund_bank.*', 'laporan_bank.*')
                    // ->where('fund_ziswaf.id_pendanaan_ziswaf', '=', 'laporan_ziswaf.id_pendanaan_ziswaf' )
                    ->orderBy('laporan_bank.id_laporan_b', 'desc')
                    ->paginate(5);

        $tampilnamabank  = DB::table('fund_bank')
                            ->select('fund_bank.*')
                            ->where('fund_bank.id_lkm', '=', $id )
                            ->get();

        return view('lkm.dashboard-reportpendanaanbank', ['tampilnamabank' => $tampilnamabank])->with('reportBank',$result);
   
    }

    public function detailReportBank(Request $req, $id)
    {
        $detailDana['data']  = DB::table('laporan_penggunaan_bank')
            ->where('laporan_penggunaan_bank.id_laporan_b','=',$id)
            ->orderBy('id_laporan_bt', 'desc')
            ->paginate(30);

        $detailDana['id'] = $id;
        return view('lkm.dashboard-detailreportpendanaanbank')->with('detailDana',$detailDana)->with('id', $id);;
    }

    
    public function createLaporanBank(Request $request) {
    
    $inputlaporanbulananbank = $request->all();

    $dateimputtgl = Carbon::now()->format('Y-m-d H:i:s');

    $datalaporanbulananbank = array(
            'id_pendanaan_bank' => $inputlaporanbulananbank['id_pendanaan_bank'],
            'bulan'             => $inputlaporanbulananbank['bulan'],
            'tahun'             => $inputlaporanbulananbank['tahun'],
            'created_at'        => $dateimputtgl,
            'updated_at'        => $dateimputtgl,
        );

    $i = DB::table('laporan_bank')->insert($datalaporanbulananbank);

    if ($i > 0) {
        
        $id_pengguna = $inputlaporanbulananbank['id_lkm'];
        return redirect('lkm/dashboard-reportpendanaanbank/'.$id_pengguna);
      
        }

    }

    public function uploaddetaillaporanbank(Request $request){
        $postpendanaan = $request->all();
        $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');

        $postpendanaan = array(
                'akun'               => $postpendanaan['transaksi'], 
                'date'               => $postpendanaan['tgl_transaksi'], 
                'kategori_transaksi' => $postpendanaan['kategori'], 
                'jumlah_transaksi'   => $postpendanaan['jumlah_transaksi'], 
                'id_laporan_b'       => $postpendanaan['id_laporan_b'],
                'date'               => $dateimputpendanaan, 
            );

        $result = DB::select('SELECT * FROM laporan_penggunaan_bank
            WHERE id_laporan_b = :id
            ORDER BY id_laporan_bt DESC
            LIMIT 0,1', [$postpendanaan['id_laporan_b']]);
        
        if (count($result)) {
            $total_pemasukan = $result[0]->total_pemasukan;
            $total_pengeluaran = $result[0]->total_pengeluaran;
            $saldo_dana_usaha = $result[0]->saldo_dana_usaha;
        }else{
            $total_pemasukan = 0;
            $total_pengeluaran = 0;
            $saldo_dana_usaha = 0;
        }
        if ($postpendanaan['kategori_transaksi'] == 'Pemasukan') {
            $penambahan = $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pemasukan'] = $total_pemasukan + $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pengeluaran'] = $total_pengeluaran;
        }else{
            $penambahan = 0 - $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pengeluaran'] = $total_pengeluaran + $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pemasukan'] = $total_pemasukan;
        }
        $postpendanaan['saldo_dana_usaha'] = $saldo_dana_usaha + $penambahan;
        $i = DB::table('laporan_penggunaan_bank')->insert($postpendanaan);
        $i2 = DB::table('laporan_bank')
            ->where('id_laporan_b','=',$postpendanaan['id_laporan_b'])
            ->update(array('total_pengeluaran' => $postpendanaan['total_pengeluaran'],
                'total_pemasukan'=> $postpendanaan['total_pemasukan'],
                'saldo_usaha' => $postpendanaan['saldo_dana_usaha']));
        if ($i && $i2) {
            return redirect('/lkm/dashboard-detailreportpendanaanbank/'.$postpendanaan['id_laporan_b']);
        }
    } 

    public function getAllPendanaanBank($id){
        $pendanaanbank  = DB::table('fund_bank')
                    ->join('userumkm', 'fund_bank.id_umkm', '=', 'userumkm.id_umkm')
                    ->join('users', 'fund_bank.id_lkm', '=', 'users.id')
                    ->select('fund_bank.*', 'userumkm.*', 'users.*')
                    // ->where('users.id', '=', 'fund_bank.id_lkm' )
                    ->where('fund_bank.status', '=', 1 )
                    ->where('fund_bank.id_bank', '=', $id )
                    ->orderBy('fund_bank.id_pendanaan_bank', 'desc')
                    ->paginate(5);

        $pendanaanbankacc  = DB::table('fund_bank')
                    ->join('userumkm', 'fund_bank.id_umkm', '=', 'userumkm.id_umkm')
                    ->join('users', 'fund_bank.id_lkm', '=', 'users.id')
                    ->select('fund_bank.*', 'userumkm.*', 'users.*')
                    // ->where('users.id', '=', 'fund_bank.id_lkm' )
                    ->where('fund_bank.status', '=', 3 )
                    ->where('fund_bank.id_bank', '=', $id )
                    ->orderBy('fund_bank.id_pendanaan_bank', 'desc')
                    ->paginate(5);
        // var_dump($pendanaanbank);

        $pendanaanbankreject  = DB::table('fund_bank')
                    ->join('userumkm', 'fund_bank.id_umkm', '=', 'userumkm.id_umkm')
                    ->join('users', 'fund_bank.id_lkm', '=', 'users.id')
                    ->select('fund_bank.*', 'userumkm.*', 'users.*')
                    // ->where('users.id', '=', 'fund_bank.id_lkm' )
                    ->where('fund_bank.status', '=', 4 )
                    ->where('fund_bank.id_bank', '=', $id )
                    ->orderBy('fund_bank.id_pendanaan_bank', 'desc')
                    ->paginate(5);

        return view('bank.bank-pendanaan',['pendanaanbank' => $pendanaanbank],['pendanaanbankacc' => $pendanaanbankacc])->withPendanaanbankreject($pendanaanbankreject);

        // return view('bank.bank-home')->withPendanaanbank($pendanaanbank);
    }

    public function getAllPendanaanBankDetails($id){
        $pendanaanbankdetails  = DB::table('fund_bank')
                    ->join('userumkm', 'fund_bank.id_umkm', '=', 'userumkm.id_umkm')
                    ->join('users', 'fund_bank.id_lkm', '=', 'users.id')
                    ->select('fund_bank.*', 'userumkm.*', 'users.name')
                    ->where('fund_bank.id_pendanaan_bank', '=', $id )
                    ->get();

        // var_dump($pendanaanbankdetails);
        return view('bank.bank-details')->withPendanaanbankdetails($pendanaanbankdetails);
    }


    public function uploadinvoicebank(Request $request){

        $uploadinvoice = $request->all();

        $v = \Validator::make($request->all(),
            [
                'file' => 'required',
            ]);

        if($v->fails())
        {
            \Session::flash('message-bank', 'Submit Invoice Gagal, Silahkan Coba Submit Ulang');
            return redirect()->back()->withErrors($v->errors());

        } else {

            if(Input::hasFile('file')){

                    $file       = Input::file('file');
                    $file->move('bank/img/invoice/', $file->getClientOriginalName());
                    $namafileinvoice = $file->getClientOriginalName();

                DB::table('fund_bank')->where('id_pendanaan_bank', $uploadinvoice['id_pendanaan_bank'])->update(['status' => $uploadinvoice['status']]);

                DB::table('fund_bank')->where('id_pendanaan_bank', $uploadinvoice['id_pendanaan_bank'])->update(['gambar_invoice' => $namafileinvoice]);

                // \Session::flash('message-bank', 'Input Invoice Bank Berhasil');
                return redirect('bank/pendanaan/'.$uploadinvoice['id_bank']);
                
                }

        }

    }

    public function uploadinvoicereject(Request $request){

        $uploadinvoicereject = $request->all();

        DB::table('fund_bank')->where('id_pendanaan_bank', $uploadinvoicereject['id_pendanaan_bank'])->update(['status' => $uploadinvoicereject['status']]);

        return redirect('bank/pendanaan/'.$uploadinvoicereject['id_bank']);

    }

    public function getIDBank(){
        $iduseraktif = Auth::user()->id;

        $idbank  = DB::table('userbank')
                    ->join('users', 'users.id', '=', 'userbank.id_users')
                    ->select('userbank.id_bank')
                    ->where('userbank.id_users', '=', $iduseraktif )
                    ->get();

                    // var_dump($idbank);

        // var_dump($pendanaanbankdetails);
        return view('bank.bank-home')->withIdbank($idbank);
    }
    
}
