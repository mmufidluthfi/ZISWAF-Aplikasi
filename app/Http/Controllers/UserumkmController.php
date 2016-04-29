<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\userumkm;

use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;

class UserumkmController extends Controller
{
    //Halaman Administrator Pendanaan
	public function getUserumkm($id){
    	$userumkm  = DB::table('userumkm')
                    ->where('userumkm.lembagaID', '=', $id )
			    	->orderBy('id_umkm', 'desc')
			    	->paginate(5);

    	// return view('administrator.administrator-lihatumkm')->withUserumkm($userumkm);
        return view('administrator.umkm')->withUserumkm($userumkm);
	}

    //Halaman Administrator Pendanaan
    // public function getUserumkmpendanaan($id){
    //     $userumkmpendanaan  = DB::table('userumkm')
    //                 ->where('userumkm.lembagaID', '=', $id )
    //                 ->get();

    //     // return view('administrator.administrator-lihatumkm')->withUserumkm($userumkm);
    //     return view('administrator.pendanaan')->withUserumkmpendanaan($userumkmpendanaan);
    // }

	//Submit UMKM
	public function uploadumkm(Request $request){

        $submitumkm = $request->all();

        $v = \Validator::make($request->all(),
            [
                'file' => 'required',
            ]);

        if($v->fails())
        {
            \Session::flash('message-pesanerror', 'Submit Gagal, Silahkan Coba Submit Ulang');
            return redirect()->back()->withErrors($v->errors());

        } else {

    		if(Input::hasFile('file')){

                $file = Input::file('file');
                $file->move('images/avatar/', $file->getClientOriginalName());
                $namafile = $file->getClientOriginalName();

                $listumkm = array(
                    'lembagaID'   => $submitumkm['lembagaID'], 
                    'username'    => $submitumkm['username'], 
                    'password'    => $submitumkm['password'], 
                    'nama_pj'     => $submitumkm['nama_pj'], 
                    'email'       => $submitumkm['email'], 
                    'no_hp'       => $submitumkm['no_hp'], 
                    'alamat_pj'   => $submitumkm['alamat_pj'], 
                    'alamat_umkm'  => $submitumkm['alamat_umkm'], 
                    'foto_pj'     => $namafile, 
                );

                $id_lembaga = $submitumkm['lembagaID'];

                $submitlistumkm = DB::table('userumkm')->insert($listumkm);

                \Session::flash('message-inputberhasil', 'UMKM Berhasil Ditambahkan');
                // return redirect('administrator/lihatumkm');
                return redirect('administrator/umkm/'.$id_lembaga);

            }
        }
    }

}
