<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\laporan;
use App\userumkm;
use App\Http\Requests;

use DB;
use Illuminate\Pagination\LengthAwarePaginator;


class LaporanController extends Controller
{
    public function getInformasiLaporan($id){

		$laporanpendanaan = DB::table('laporan_crowd')
		            ->join('pendanaan', 'laporan_crowd.id_pendanaan', '=', 'pendanaan.id_pendanaan')
		            ->join('userumkm', 'pendanaan.id_umkm', '=', 'userumkm.id_umkm')
		            ->join('transaksi', 'transaksi.id_pendanaan', '=', 'pendanaan.id_pendanaan')
		            ->join('users', 'users.id', '=', 'transaksi.id')
		            ->select('pendanaan.nama_proyek', 'userumkm.nama_pj', 'laporan_crowd.bulan', 'laporan_crowd.tahun', 'laporan_crowd.total_pengeluaran', 'laporan_crowd.total_pemasukan', 'laporan_crowd.saldo_usaha')
		            ->where('users.id', '=', $id)
		            ->paginate(10);

	  	//var_dump($laporanpendanaan);
	 	return view('dashboard.dashboard-laporan')->withLaporanpendanaan($laporanpendanaan);
	 }

	// public function getLaporan($id_pendanaan){
	//     $laporan  = laporan::find($id_pendanaan);
	//     return view('details-pendanaan')->withLaporan($laporan);
	// }


}
