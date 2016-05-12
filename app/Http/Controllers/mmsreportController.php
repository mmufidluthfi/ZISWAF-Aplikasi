<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class mmsreportController extends Controller
{
    public function getdatabrowser(){
    	$totallembaga = DB::table('users')
    					->where('users.admin', '=', 1)
    					->count('users.id');

    	$totalbank = DB::table('users')
    					->where('users.admin', '=', 3)
    					->count('users.id');

    	$totallkm = DB::table('users')
    					->where('users.admin', '=', 2)
    					->count('users.id');

    	//UMKM
    	$totalperson = DB::table('users')
    					->where('users.admin', '=', 5)
    					->count('users.id');

    	$totalumkm = DB::table('users')
    					->join('pendanaan_bank', 'pendanaan_bank.id_person', '=', 'users.id')
    					->where('users.admin', '=', 5)
    					->distinct('users.id')
    					->count('users.id');

    	$totalnewumkm = $totalperson - $totalumkm;

    	$totaldonatur = DB::table('users')
    					->where('users.admin', '=', 0)
    					->count('users.id');

		$umkm = DB::select('SELECT FLOOR(DATEDIFF(NOW(), users.created_at) / 365) AS period FROM users JOIN pendanaan_bank ON users.id = pendanaan_bank.id_person WHERE admin = 5 GROUP BY id');
		$newUmkm = DB::select('SELECT FLOOR(DATEDIFF(NOW(), users.created_at) / 365) AS period FROM users WHERE admin = 5 AND id NOT IN (SELECT id_person FROM pendanaan_bank)');

		$period = collect([]);

		foreach ($umkm as $u) {
			if ($period->contains('period', $u->period)) {
				$period = $period->map(function (&$item, $key) use ($u) {
					if ($item['period'] == $u->period) {
						$item['umkm'] -= 1;
					}

					return $item;
				});
			} else {
				$period[] = [
					'period' => $u->period,
					'umkm' => -1,
					'newUmkm' => 0
				];
			}
		}

		foreach ($newUmkm as $n) {
			if ($period->contains('period', $n->period)) {
				$period = $period->map(function (&$item, $key) use ($n) {
					if ($item['period'] == $n->period) {
						$item['newUmkm'] += 1;
					}

					return $item;
				});
			} else {
				$period[] = [
					'period' => $n->period,
					'umkm' => 0,
					'newUmkm' => 1
				];
			}
		}

		$period = $period->sortBy('period');

    	// return view('administrator.administrator-listdonasi')->withPendanaanadmin($pendanaanadmin);
        return view('report.data-browser',['totallembaga' => $totallembaga, 'totalbank' => $totalbank, 'period' => $period, 'umkm' => $umkm, 'newUmkm' => $newUmkm])->withTotallkm($totallkm)->withTotalumkm($totalumkm)->withTotalnewumkm($totalnewumkm)->withTotaldonatur($totaldonatur);
		// return view('report.data-browser')->withTotalnewumkm($totalnewumkm)->withTotallembaga($total;
	}

    public function getdatadahsboardPendanaan(){
        $totalumkmterdaftar = DB::table('pendanaan')
                        ->distinct('pendanaan.id_umkm')
                        ->count('pendanaan.id_umkm');

        $totalumkmterdaftarterdanai = DB::table('pendanaan')
                        ->where('pendanaan.status', '=', 1)
                        ->distinct('pendanaan.id_umkm')
                        ->count('pendanaan.id_umkm');

        $totaltransaksi = DB::table('transaksi')
                        ->where('transaksi.status', '=', 1)
                        ->sum('transaksi.nominal');

        // return view('administrator.administrator-listdonasi')->withPendanaanadmin($pendanaanadmin);
        return view('report.dashboard',['totalumkmterdaftar' => $totalumkmterdaftar], ['totalumkmterdaftarterdanai' => $totalumkmterdaftarterdanai])->withTotaltransaksi($totaltransaksi);
        // return view('report.data-browser')->withTotalnewumkm($totalnewumkm)->withTotallembaga($total;
    }
}
