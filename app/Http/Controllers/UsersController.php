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

use Auth;

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

            $postpengaturan = $request->all();

            $post = array(
                'id_userpassword'        => $postpengaturan['id_userpassword'], 
                'password_userpassword'  => $postpengaturan['password_userpassword'],
                'passlama'               => $postpengaturan['passlama'], 
                'password'               => $postpengaturan['password'],
            ); 

            $user          = Input::get('id_userpassword');

            $newpassword   = Input::get('password');

            $newpasswordencrypt = bcrypt($newpassword);

            $oldpassword   = Input::get('passlama');

            $oldpassworddb = Input::get('password_userpassword');
            

            if(Hash::check($oldpassword, $oldpassworddb)){

                DB::table('users')->where('id', $user)->update(['password' => $newpasswordencrypt]);

                \Session::flash('message-password', 'Password Berhasil diubah');
                return redirect('dashboard/pengaturan/');

            } else {
                
                \Session::flash('message-password', 'Password Gagal diubah, Coba masukkan kembali');
                return redirect('dashboard/pengaturan/');

            }

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
                'name'       => $databank['name'],
                'email'      => $databank['email'],
                'password'   => bcrypt($databank['password']),
                'url_foto'   => $databank['url_foto'],
                'admin'      => $databank['admin'],
                'created_at' => $dateimputtgl,
                'updated_at' => $dateimputtgl,
            );

            $datainformasibank = array(
                'nama_bank' => $databank['name'],
                'email_bank' => $databank['email'],
            );

            $i = DB::table('users')->insertGetId($datatransaksi);
            $i2 = DB::table('userbank')->insertGetId($datainformasibank);

            DB::table('userbank')->where('id_bank', $i2)->update(['id_users' => $i]);

                if ($i > 0) {
                    
                      \Session::flash('message-inputberhasil', 'Bank Berhasil ditambahkan');
                  
                  return redirect('superadmin/superadmin/');
                  
                } 
            
        }

    }

    public function input_umkm(Request $request)
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
                
                  \Session::flash('message-inputberhasil', 'UMKM Berhasil ditambahkan');
              
              return redirect('lkm/home/');
              
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

        return view('administrator.manageuser',['listlkm' => $listlkm]);  
    }

    // public function getAllInfobank(){

    //     $listbank = DB::table('users')
    //                 ->select('users.*')
    //                 ->where('users.lembagaID', '=', $id )
    //                 ->where('users.admin', '=', 3)
    //                 ->orderBy('users.id', 'desc')
    //                 ->paginate(5);

    //     return view('superadmin.superadmin',['listbank' => $listbank]);  

    //     // return view('administrator.administrator-listdonasi')->withPendanaanadmin($pendanaanadmin);
    //     // return view('administrator.listuser')->withListlkm($listlkm);
    // }

    public function daftarlembaga(Request $request)
    {

        $datalembaga = $request->all();

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

            $inputdatalembaga = array(
                'name'       => $datalembaga['name'],
                'email'      => $datalembaga['email'],
                'password'   => bcrypt($datalembaga['password']),
                'url_foto'   => $datalembaga['url_foto'],
                'admin'      => 1,
                'created_at' => $dateimputtgl,
                'updated_at' => $dateimputtgl,
            );

            $inputdatabanklembaga = array(
                'updated_at' => $dateimputtgl,
            );

                $i = DB::table('users')->insertGetId($inputdatalembaga);

                DB::table('rekeningbank')->insert(['lembagaID' => $i]);

                if ($i > 0) {
                    
                    \Session::flash('message-inputberhasil', 'Lembaga Berhasil ditambahkan');
                  
                    return redirect('superadmin/superadmin/');
                  
                } 
            
        }

    }

    public function getAllLembagaBank(){
        
        $listlembaga = DB::table('users')
                    ->select('users.*')
                    ->where('users.admin', '=', 1)
                    ->orderBy('users.id', 'desc')
                    ->paginate(10);

        $listbank = DB::table('users')
                    ->select('users.*')
                    ->where('users.admin', '=', 3)
                    ->orderBy('users.id', 'desc')
                    ->paginate(5);

        return view('superadmin.superadmin',['listlembaga' => $listlembaga],['listbank' => $listbank]);  

        // return view('superadmin.superadmin')->withListlembaga($listlembaga);
    }

    public function hapuslkm(Request $request)
    {
        $hapusdatalkm = $request->all();

        DB::table('users')->where('id', '=', $hapusdatalkm['id'])->delete();

        $iduseraktif = Auth::user()->id;

        \Session::flash('message-inputberhasil', 'LKM Berhasil Dihapus');
        return redirect('administrator/manageuser/'.$iduseraktif);
    }

    public function hapusbank(Request $request)
    {

        $hapusdatabank = $request->all();

        DB::table('users')->where('id', '=', $hapusdatabank['id'])->delete();
        DB::table('userbank')->where('id_users', '=', $hapusdatabank['id'])->delete();

        \Session::flash('message-inputberhasil', 'Bank Berhasil Dihapus');
        return redirect('superadmin/superadmin/');

    }


}
