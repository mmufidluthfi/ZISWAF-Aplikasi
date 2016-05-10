<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    public $table = "contactus";
  	
  	protected $fillable = ['nama_lengkap','email','pesan', 'tanggal_pesan'];
  	
  	protected $primaryKey = 'id_contactus';
}
