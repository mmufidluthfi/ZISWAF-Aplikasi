<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userumkm extends Model
{
    public $table = "userumkm";
  	
  	protected $fillable = ['username','password','nama_pj', 'email', 'no_hp', 'alamat_pj', 'alamat_umkm', 'foto_pj'];
  	
  	protected $primaryKey = 'id_umkm';
  	
}
