<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\foto_profile;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Hash;

class UsersController extends Controller
{

	// public function getFotoprofile($id_user){
	//     $foto_profile  = foto_profile::find($id_user);
	//     return view('dashboard.dashboard-pengaturan')->withFoto_profile($foto_profile);
	// }

	// public function getFotoprofile($id_user){	    
	// 	$fotoprofile = DB::table('foto_profile')->where('id_user', '=', $id_user)->get();
 //    	return view('dashboard.dashboard-pengaturan')->withFotoprofile($fotoprofile);
	// }

    public function uploadfoto(Request $request){

        if(Input::hasFile('filefoto')){

                $postprofile = $request->all();

                $filefoto = Input::file('filefoto');
                $filefoto->move('dashboard/images/fotoprofile', $filefoto->getClientOriginalName());
                $namafilefoto = $filefoto->getClientOriginalName();

                $datatransaksiGambar = array(
                        'id_user'      => $postprofile['id_usergambar'], 
                        'url_foto'     => $namafilefoto, 
                    );

                $bukti_transaksiDonasi = DB::table('users')->where('id', $postprofile['id_usergambar'])->update(['url_foto' => $namafilefoto]);

                //$bukti_transaksiDonasi = DB::table('foto_profile')->insert($datatransaksiGambar);

            	return redirect('dashboard/pengaturan');

        }

    }


    public function editpassword(Request $request){

        $posteditpassword = $request->all();

        $posteditpassword = array(
                'id_userpassword'    => $posteditpassword['id_userpassword'], 
                'passlama'           => bcrypt($posteditpassword['passlama']), 
                'passbaru'           => bcrypt($posteditpassword['passbaru']), 
                'konfirmasipassbaru' => bcrypt($posteditpassword['konfirmasipassbaru']), 
            );

        $userpendanaan = DB::table('users')
                ->where('id', '=', $posteditpassword['id_userpassword'])
                ->get();

        // $validator = Validator::make(Input::all(), $posteditpassword);

        foreach ($userpendanaan as $upd) {
            $a = $upd->password;
            $b = $posteditpassword['passlama'];

            // var_dump($a);
            // if (!Hash::check($b, $a) {
            //     echo "Mantab ".$a."Oke ".$b." ";
            // } else {
            //     echo "Gagal ".$a."Oke ".$b." ";
            // }

        }

    }


}
