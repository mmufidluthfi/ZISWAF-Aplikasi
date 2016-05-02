<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\LengthAwarePaginator;

class ZiswafController extends Controller
{
    public function listReportZiswaf(Request $request, $id){
    	// $result = DB::select('SELECT * FROM laporan_ziswaf, fund_ziswaf
     //        WHERE laporan_ziswaf.id_pendanaan_ziswaf=fund_ziswaf.id_pendanaan_ziswaf ORDER BY id_laporan_z DESC');

        $result = DB::table('laporan_ziswaf')
                    ->join('fund_ziswaf', 'fund_ziswaf.id_pendanaan_ziswaf', '=', 'laporan_ziswaf.id_pendanaan_ziswaf')
                    ->select('fund_ziswaf.*', 'laporan_ziswaf.*')
                    // ->where('fund_ziswaf.id_pendanaan_ziswaf', '=', 'laporan_ziswaf.id_pendanaan_ziswaf' )
                    ->orderBy('laporan_ziswaf.id_laporan_z', 'desc')
                    ->paginate(5);

    	$tampilnamaproyek  = DB::table('fund_ziswaf')
					    	->select('fund_ziswaf.*')
					    	->where('fund_ziswaf.id_lkm', '=', $id )
					    	->get();

		return view('lkm.dashboard-reportpendanaanziswaf', ['tampilnamaproyek' => $tampilnamaproyek])->with('reportZiswaf',$result);
   
    }

    public function detailReport(Request $req, $id)
    {

    	$detailDana['data']  = DB::table('laporan_penggunaan_ziswaf')
            ->where('laporan_penggunaan_ziswaf.id_laporan_z','=',$id)
            ->orderBy('id_laporan_zt', 'desc')
            ->paginate(30);
        $detailDana['id'] = $id;
        return view('lkm.dashboard-detailreportpendanaanziswaf')->with('detailDana',$detailDana)->with('id', $id);;

    }

    public function uploaddetaillaporan(Request $request){
                $postpendanaan = $request->all();
                $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');

                $postpendanaan = array(
                        'akun'        => $postpendanaan['transaksi'], 
                        'date'    => $postpendanaan['tgl_transaksi'], 
                        'kategori_transaksi'       => $postpendanaan['kategori'], 
                        'jumlah_transaksi'     => $postpendanaan['jumlah_transaksi'],                     
                        'id_laporan_z'          => $postpendanaan['id_laporan_z'],
                        'date'  => $dateimputpendanaan, 
                    );
                $result = DB::select('SELECT * FROM laporan_penggunaan_ziswaf
                    WHERE id_laporan_z = :id
                    ORDER BY id_laporan_zt DESC
                    LIMIT 0,1', [$postpendanaan['id_laporan_z']]);
                
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
                $i = DB::table('laporan_penggunaan_ziswaf')->insert($postpendanaan);
                $i2 = DB::table('laporan_ziswaf')
                    ->where('id_laporan_z','=',$postpendanaan['id_laporan_z'])
                    ->update(array('total_pengeluaran' => $postpendanaan['total_pengeluaran'],
                        'total_pemasukan'=> $postpendanaan['total_pemasukan'],
                        'saldo_usaha' => $postpendanaan['saldo_dana_usaha']));
                if ($i && $i2) {
                    return redirect('/lkm/detail_laporan_ziswaf/'.$postpendanaan['id_laporan_z']);
                }
		} 

	public function createLaporanCrowd(Request $request) {
    
    $inputlaporanbulanan = $request->all();

    $dateimputtgl = Carbon::now()->format('Y-m-d H:i:s');

    $datalaporanbulanan = array(
            'id_pendanaan' => $inputlaporanbulanan['id_pendanaan'],
            'bulan' 	   => $inputlaporanbulanan['bulan'],
            'tahun' 	   => $inputlaporanbulanan['tahun'],
            'created_at'   => $dateimputtgl,
            'updated_at'   => $dateimputtgl,
        );

    $i = DB::table('laporan_crowd')->insert($datalaporanbulanan);

	if ($i > 0) {
	  	
	  	$id_pengguna = $inputlaporanbulanan['id_user'];
	  	return redirect('lkm/laporancrowd/'.$id_pengguna);
      
		}

    }

	  public function createLaporanZiswaf(Request $request) {
	        
	        $inputlaporanbulanan = $request->all();

	        $dateimputtgl = Carbon::now()->format('Y-m-d H:i:s');

	        $datalaporanbulanan = array(
	                'id_pendanaan_ziswaf' => $inputlaporanbulanan['id_pendanaan'],
	                'bulan' 	   => $inputlaporanbulanan['bulan'],
	                'tahun' 	   => $inputlaporanbulanan['tahun'],
	                'created_at'   => $dateimputtgl,
	                'updated_at'   => $dateimputtgl,
	            );

	        $i = DB::table('laporan_ziswaf')->insert($datalaporanbulanan);

			if ($i > 0) {
			  	
			  	$id_pengguna = $inputlaporanbulanan['id_user'];
			  	return redirect('lkm/dashboard-reportpendanaanziswaf/'.$id_pengguna);
	          
	    		}

	    }

}
