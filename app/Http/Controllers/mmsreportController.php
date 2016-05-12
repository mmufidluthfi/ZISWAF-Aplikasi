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


    	// return view('administrator.administrator-listdonasi')->withPendanaanadmin($pendanaanadmin);
        return view('report.data-browser',['totallembaga' => $totallembaga], ['totalbank' => $totalbank])->withTotallkm($totallkm)->withTotalumkm($totalumkm)->withTotalnewumkm($totalnewumkm)->withTotaldonatur($totaldonatur);
		// return view('report.data-browser')->withTotalnewumkm($totalnewumkm)->withTotallembaga($total;
	}
}
