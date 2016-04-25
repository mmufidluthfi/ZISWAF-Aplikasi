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
	public function getUserumkm(){
    	$userumkm  = DB::table('userumkm')
			    	->orderBy('id_umkm', 'desc')
			    	->paginate(5);

    	// return view('administrator.administrator-lihatumkm')->withUserumkm($userumkm);
        return view('administrator.umkm')->withUserumkm($userumkm);
	}

	//Submit UMKM
	public function uploadumkm(Request $request){

		if(Input::hasFile('file')){

            $submitumkm = $request->all();

            $file = Input::file('file');
            $file->move('images/avatar/', $file->getClientOriginalName());
            $namafile = $file->getClientOriginalName();

            $listumkm = array(
                'username'    => $submitumkm['username'], 
                'password'    => $submitumkm['password'], 
                'nama_pj'     => $submitumkm['nama_pj'], 
                'email'       => $submitumkm['email'], 
                'no_hp'       => $submitumkm['no_hp'], 
                'alamat_pj'   => $submitumkm['alamat_pj'], 
                'alamat_umkm'  => $submitumkm['alamat_umkm'], 
                'foto_pj'     => $namafile, 
            );

            $submitlistumkm = DB::table('userumkm')->insert($listumkm);

            // return redirect('administrator/lihatumkm');
            return redirect('administrator/umkm');

        }
    }

}
