<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    public $table = "transaksi";
  	
  	protected $fillable = ['nominal','konfirmasi','status','tanggal'];
  	
  	protected $primaryKey = 'id_transaksi';
	
}
