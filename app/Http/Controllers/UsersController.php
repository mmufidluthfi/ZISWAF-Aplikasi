<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\foto_profile;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Carbon\Carbon;

use Hash;

class UsersController extends Controller
{

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

    public function input_lkm(Request $request)
    {

        $datalkm = $request->all();

        $v = \Validator::make($request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

        $dateimputtgl = Carbon::now()->format('Y-m-d H:i:s');

        if($v->fails())
        {

            return redirect()->back()->withErrors($v->errors());

        } else {

            $datatransaksi = array(
                'name' => $datalkm['name'],
                'email' => $datalkm['email'],
                'password' => $datalkm['password'],
                'url_foto' => $datalkm['url_foto'],
                'lembagaID' => $datalkm['lembagaID'],
                'admin' => $datalkm['admin'],
                'created_at' => $dateimputtgl,
                'updated_at' => $dateimputtgl,
            );

            $i = DB::table('users')->insert($datatransaksi);

            if ($i > 0) {

                  $id_lembaga = $datalkm['lembagaID'];
                
                  \Session::flash('message-inputberhasil', 'LKM Berhasil ditambahkan');
              
              return redirect('administrator/manageuser/'.$id_lembaga);
              
            } 
            
        }

    }

    public function input_bank(Request $request)
    {

        $databank = $request->all();

        $v = \Validator::make($request->all(),
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

        $dateimputtgl = Carbon::now()->format('Y-m-d H:i:s');

        if($v->fails())
        {

            return redirect()->back()->withErrors($v->errors());

        } else {

            $datatransaksi = array(
                'name' => $databank['name'],
                'email' => $databank['email'],
                'password' => $databank['password'],
                'url_foto' => $databank['url_foto'],
                'lembagaID' => $databank['lembagaID'],
                'admin' => $databank['admin'],
                'created_at' => $dateimputtgl,
                'updated_at' => $dateimputtgl,
            );

            $i = DB::table('users')->insert($datatransaksi);

            if ($i > 0) {

                $id_lembaga = $databank['lembagaID'];
                
                  \Session::flash('message-inputberhasil', 'Bank Berhasil ditambahkan');
              
              return redirect('administrator/manageuser/'.$id_lembaga);
              
            } 
            
        }

    }

    public function getAllInfo($id){
        $listlkm = DB::table('users')
                    ->select('users.*')
                    ->where('users.lembagaID', '=', $id )
                    ->where('users.admin', '=', 2)
                    ->orderBy('users.id', 'desc')
                    ->paginate(5);

        $listbank = DB::table('users')
                    ->select('users.*')
                    ->where('users.lembagaID', '=', $id )
                    ->where('users.admin', '=', 3)
                    ->orderBy('users.id', 'desc')
                    ->paginate(5);

        return view('administrator.manageuser',['listlkm' => $listlkm],['listbank' => $listbank]);  

        // return view('administrator.administrator-listdonasi')->withPendanaanadmin($pendanaanadmin);
        // return view('administrator.listuser')->withListlkm($listlkm);
    }

}
