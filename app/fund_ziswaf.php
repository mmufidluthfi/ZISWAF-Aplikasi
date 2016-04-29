<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fund_ziswaf extends Model
{
    public $table = "fund_ziswaf";
  	
  	protected $fillable = ['nama_pendanaan','kategori','tgl_pendanaan', 'id_lkm', 'total_dana'];
  	
  	protected $primaryKey = 'id_pendanaan_ziswaf';
  	
}
