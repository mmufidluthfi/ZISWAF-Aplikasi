<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\foto_profile;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Validator;

use Carbon\Carbon;

use Hash;

class UsersController extends Controller
{

    public function uploadfoto(Request $request){

        $postprofile = $request->all();

        $v = \Validator::make($request->all(),
            [
                'filefoto' => 'required',
            ]);

        if($v->fails())
        {
            
            \Session::flash('message-uploadgagal', 'Upload Foto Gagal, Silahkan Upload Ulang');
            return redirect()->back()->withErrors($v->errors());

        } else {

            if(Input::hasFile('filefoto')){

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

    }


    public function editpassword(Request $request){

        $validator = Validator::make(Input::all(),
            array(
                'passlama'           => 'required',
                'password'           => 'required|min:6',
                'konfirmasipassbaru' => 'required|same:password'
            )
        );

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);

        } else {
            // Change
            // passed validation

        // Grab the current user
            $posteditpassword = $request->all();

            $posteditpassword = array(
                'id_userpassword'    => $posteditpassword['id_userpassword'], 
                'passlama'           => bcrypt($posteditpassword['passlama']), 
                'password'           => bcrypt($posteditpassword['password']), 
                'konfirmasipassbaru' => bcrypt($posteditpassword['konfirmasipassbaru']), 
            ); 

            $user           = Input::get('id_userpassword');

            // Get passwords from the user's input
            $old_password   = Input::get('passlama');
            $old_passwordvalidation   = Input::get('password_userpassword');
            $password       = Input::get('password');

            var_dump($old_passwordvalidation);
            

            // test input password against the existing one
        //     if(Hash::check($old_password, $old_passwordvalidation){

        //         $user->password = Hash::make($password);

        //         // save the new password
        //         if($user->save()) {

        //             var_dump($posteditpassword->password);
        //             // DB::table('users')->where('id', $posteditpassword['id_userpassword'])->update(['password' => bcrypt($posteditpassword['password'])]);

        //             // return Redirect::route('dashboard.dashboard-pengaturan')
        //             //         ->with('global', 'Your password has been changed.');

                            
        //         }

        //     } else {
        //         return Redirect::route('dashboard.dashboard-home')
        //             ->with('global', 'Your old password is incorrect.');
        //     }
        // }

        // return Redirect::route('dashboard.dashboard-pendanaan')
        // ->with('global', 'Your password could not be changed.');
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
                'password' => bcrypt($datalkm['password']),
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
                'password' => bcrypt($databank['password']),
                'url_foto' => $databank['url_foto'],
                'lembagaID' => $databank['lembagaID'],
                'admin' => $databank['admin'],
                'created_at' => $dateimputtgl,
                'updated_at' => $dateimputtgl,
            );

            $datainformasibank = array(
                'nama_bank' => $databank['name'],
                'email_bank' => $databank['email'],
                'lembagaID' => $databank['lembagaID'],
            );

            $i = DB::table('users')->insert($datatransaksi);
            $i2 = DB::table('userbank')->insert($datainformasibank);

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
