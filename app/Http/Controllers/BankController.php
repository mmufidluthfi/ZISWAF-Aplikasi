<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

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

    	 return view('lkm.dashboard-pendanaanusaha',['userumkmpendanaan' => $userumkmpendanaan],['userbankpendanaan' => $userbankpendanaan]);
	}

}
