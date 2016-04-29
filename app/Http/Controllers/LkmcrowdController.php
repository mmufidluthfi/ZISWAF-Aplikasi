<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Carbon\Carbon;

class LkmcrowdController extends Controller
{
    //Halaman Administrator Pendanaan
	public function getAllPendanaanLkmCrowd($id){
    	$pendanaanlkm  = DB::table('pendanaan')
					    	->join('userumkm', 'pendanaan.id_umkm', '=', 'userumkm.id_umkm')
					    	->join('users', 'pendanaan.id_lkm', '=', 'users.id')
					    	->select('pendanaan.*', 'userumkm.*', 'users.*')
					    	->where('users.id', '=', $id )
					    	->where('users.admin', '=', 2)
					    	->orderBy('pendanaan.id_pendanaan', 'desc')
					    	->paginate(5);

		return view('lkm.dashboard-listpendanaancrowd',['pendanaanlkm' => $pendanaanlkm]);

	}


	public function listReportCrowd($id){
		$reportbulanan  = DB::table('laporan_crowd')
					    	->join('pendanaan', 'pendanaan.id_pendanaan', '=', 'laporan_crowd.id_pendanaan')
					    	->select('pendanaan.*', 'laporan_crowd.*')
					    	->where('pendanaan.id_lkm', '=', $id )
					    	->orderBy('laporan_crowd.id_laporan_c', 'desc')
					    	->paginate(5);

		$tampilnamaproyek  = DB::table('laporan_crowd')
					    	->join('pendanaan', 'pendanaan.id_pendanaan', '=', 'laporan_crowd.id_pendanaan')
					    	->select('pendanaan.*', 'laporan_crowd.*')
					    	->where('pendanaan.id_lkm', '=', $id )
					    	->get();

		// return view('lkm.dashboard-reportpendanaan',['reportbulanan' => $reportbulanan]);
		return view('lkm.dashboard-reportpendanaan',['reportbulanan' => $reportbulanan], ['tampilnamaproyek' => $tampilnamaproyek]);

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

    public function detailReport(Request $req, $id)
    {

    	$detailDana['data']  = DB::table('laporan_penggunaan_crowd')
            ->where('laporan_penggunaan_crowd.id_laporan_c','=',$id)
            ->orderBy('id_laporan_ct', 'desc')
            ->paginate(30);
        $detailDana['id'] = $id;
        return view('lkm.dashboard-detailreportpendanaan')->with('detailDana',$detailDana)->with('id', $id);;

    }

    public function uploaddetaillaporan(Request $request){
        $postpendanaan = $request->all();
        $dateimputpendanaan = Carbon::now()->format('Y-m-d H:i:s');

        $postpendanaan = array(
                'akun'        => $postpendanaan['transaksi'], 
                'date'    => $postpendanaan['tgl_transaksi'], 
                'kategori_transaksi'       => $postpendanaan['kategori'], 
                'jumlah_transaksi'     => $postpendanaan['jumlah_transaksi'], 
                'id_laporan_c'   => $postpendanaan['id_laporan_c'],
                'date'  => $dateimputpendanaan, 
            );

        $result = DB::select('SELECT * FROM laporan_penggunaan_crowd
            WHERE id_laporan_c = :id
            ORDER BY id_laporan_ct DESC
            LIMIT 0,1', [$postpendanaan['id_laporan_c']]);
        
        if (count($result)) {
            $total_pemasukan = $result[0]->total_pemasukan;
            $total_pengeluaran = $result[0]->total_pengeluaran;
            $saldo_dana_usaha = $result[0]->saldo_dana_usaha;
        } else {
            $total_pemasukan = 0;
            $total_pengeluaran = 0;
            $saldo_dana_usaha = 0;
        }

        if ($postpendanaan['kategori_transaksi'] == 'Pemasukan') {
            $penambahan = $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pemasukan'] = $total_pemasukan + $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pengeluaran'] = $total_pengeluaran;
        } else {
            $penambahan = 0 - $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pengeluaran'] = $total_pengeluaran + $postpendanaan['jumlah_transaksi'];
            $postpendanaan['total_pemasukan'] = $total_pemasukan;
        }

        $postpendanaan['saldo_dana_usaha'] = $saldo_dana_usaha + $penambahan;
        $i = DB::table('laporan_penggunaan_crowd')->insert($postpendanaan);

        $i2 = DB::table('laporan_crowd')
            ->where('id_laporan_c','=',$postpendanaan['id_laporan_c'])
            ->update(array('total_pengeluaran' => $postpendanaan['total_pengeluaran'],
                'total_pemasukan'=> $postpendanaan['total_pemasukan'],
                'saldo_usaha' => $postpendanaan['saldo_dana_usaha']));
        if ($i && $i2) {
            return redirect('/lkm/detail_laporan_crowdfunding/'.$postpendanaan['id_laporan_c']);
        }
	}

    

}
